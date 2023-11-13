<?php

namespace App\Http\Controllers\admin\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\LotExport;
use App\Exports\S_LotExport;
use App;
use Excel;
use App\Model\admin_user;
use App\Model\digital_form;
use App\Model\lot_submission_log;
use App\Model\form_field;
use App\Model\form_fields_log;
use App\Model\form_fields_option;
use App\Model\user_data_entry;

use ZipArchive;

class Lotcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(session('agent_id') && session('customer_id')){
          $agent_id = session('agent_id');
          $customer_id = session('customer_id');
          $customer_info = admin_user::where('id', $customer_id)->get();
          $agents = admin_user::where('role', 'agent')->get();
          $agent_info = admin_user::where('id', $agent_id)->get();
          $lot = lot_submission_log::where('customer_id', $customer_id)->get();
          return view('admin.super_admin.data_lot.view', ['agents'=>$agents, 'agent_info'=>$agent_info, 'lots'=>$lot, 'customer_info'=>$customer_info, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'user_pass'=>1]);

        }else{
          $agents = admin_user::where('role', 'agent')->get();
          return view('admin.super_admin.data_lot.view', ['user_pass'=>0,'agents'=>$agents]);
        }
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(session('agent_id') && session('customer_id')){
          $agent_id = session('agent_id');
          $customer_id = session('customer_id');
          $customer_info = admin_user::where('id', $customer_id)->get();
          $agents = admin_user::where('role', 'agent')->get();
          $agent_info = admin_user::where('id', $agent_id)->get();
          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->get();
          $data = user_data_entry::where('status', 'Verified')->where('lot_submit', '1')->where('customer_id', $customer_id)->where('lot_no', $id)->get();
          if($data){
            return view('admin.super_admin.data_lot.show', ['agents'=>$agents, 'lot_no'=>$id, 'agent_info'=>$agent_info,'fields'=>$fields, 'datas'=>$data, 'customer_info'=>$customer_info, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'user_pass'=>1]);
          }else{
            return view('admin.super_admin.data_lot.show', ['agents'=>$agents, 'agent_info'=>$agent_info,'fields'=>$fields, 'datas'=>$data, 'customer_info'=>$customer_info, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'user_pass'=>1])->with(['notification'=>'Can\'t get any Data', 'notification_type'=>'error', 'notification_title'=>'Error']);
          }
        }
        else{
          $agents = admin_user::where('role', 'agent')->get();
          return view('admin.super_admin.data_lot.view', ['user_pass'=>0,'agents'=>$agents]);
        }
    }

    public function export($lot_no)
    {
      if(session('customer_id')&&session('agent_id')){
        $customer_id = session('customer_id');
        $customer_info = admin_user::where('id', $customer_id)->limit(1)->get();

        foreach ($customer_info as $value) {
          $company_name = $value->company_name;
        }

        return (new LotExport($lot_no))->download($company_name.' [Lot '.$lot_no.'] Data'.'.xlsx');
      }else{
        return back()->with(['notification_title'=>'Error', 'notification_type'=>'error', 'notification'=>'Select Agent & Customer']);
      }


    }

    public function export_all($lot_no){
      if(session('agent_id')&&session('customer_id')){

        $agent_id = session('agent_id');
        $customer_id = session('customer_id');

        $customer_info = admin_user::where('id', $customer_id)->get();
        $data = user_data_entry::where('status', 'Verified')->where('lot_submit', '1')->where('customer_id', $customer_id)->where('lot_no', $lot_no)->get();
        foreach ($customer_info as $value2) {
          $company_name = $value2->company_name;
        }

        $file = tempnam("tmp", "zip");
        $zip = new ZipArchive();
        $zip->open($file, ZipArchive::OVERWRITE);

        $zip->addfile(Excel::download(new LotExport($lot_no), '.xlsx')->getfile(), $company_name.' [Lot '.$lot_no.'] Data.xlsx');

        foreach ($data as $value) {
          $photo_no = $value->photo_no;
          // Add contents
          $zip->addFromString($photo_no.'.jpg', base64_decode($value->photo));
        }


        // Close and send to users
        $zip->close();



        header('Content-Type: application/zip');
        header('Content-Length: ' . filesize($file));
        header('Content-Disposition: attachment; filename="'.$company_name.'[ Lot '.$lot_no.' ] Lot.zip"');
        readfile($file);
        unlink($file);
      }else{
        return back()->with(['notification_title'=>'Error', 'notification_type'=>'error', 'notification'=>'Select Agent & Customer']);
      }
    }

    public function selected_download_images(Request $request){
      if(session('agent_id')&&session('customer_id')&& $request->entry_id != null){

        $agent_id = session('agent_id');
        $customer_id = session('customer_id');

        $customer_info = admin_user::where('id', $customer_id)->get();
        $data = user_data_entry::where('status', 'Verified')->where('lot_submit', '1')->where('customer_id', $customer_id)->whereIn('id', $request->entry_id)->get();

        $file = tempnam("tmp", "zip");
        $zip = new ZipArchive();
        $zip->open($file, ZipArchive::OVERWRITE);

        foreach ($data as $value) {
          $photo_no = $value->photo_no;
          // Add contents
          $zip->addFromString($photo_no.'.jpg', base64_decode($value->photo));
          //$zip->addfile(Excel::download(new LotExport(2), '.xlsx')->getfile(), 'Master Data.xlsx');
        }


        // Close and send to users
        $zip->close();

        foreach ($customer_info as $value2) {
          $company_name = $value2->company_name;
        }

        header('Content-Type: application/zip');
        header('Content-Length: ' . filesize($file));
        header('Content-Disposition: attachment; filename="'.$company_name.'[ Selected Images ] Images.zip"');
        readfile($file);
        unlink($file);
      }else{
        return back()->with(['notification_title'=>'Error', 'notification_type'=>'error', 'notification'=>'Please Select Any One Entry data']);
      }
    }

    public function selected_export(Request $request){
      if(session('agent_id')&&session('customer_id')&& $request->entry_id != null){
        $customer_id = session('customer_id');
        $customer_info = admin_user::where('id', $customer_id)->limit(1)->get();

        foreach ($customer_info as $value) {
          $company_name = $value->company_name;
        }

        return (new S_LotExport($request->entry_id))->download($company_name.' (Selected) Data'.'.xlsx');
      }else{
        return back()->with(['notification_title'=>'Error', 'notification_type'=>'error', 'notification'=>'Please Select Any One Entry data']);
      }
    }

    public function selected_export_all(Request $request){
      if(session('agent_id')&&session('customer_id')&& $request->entry_id != null){

        $agent_id = session('agent_id');
        $customer_id = session('customer_id');

        $customer_info = admin_user::where('id', $customer_id)->get();
        $data = user_data_entry::where('status', 'Verified')->where('lot_submit', '1')->where('customer_id', $customer_id)->whereIn('id', $request->entry_id)->get();
        foreach ($customer_info as $value2) {
          $company_name = $value2->company_name;
        }

        $file = tempnam("tmp", "zip");
        $zip = new ZipArchive();
        $zip->open($file, ZipArchive::OVERWRITE);

        $zip->addfile(Excel::download(new S_LotExport($request->entry_id), '.xlsx')->getfile(), $company_name.' (Data).xlsx');

        foreach ($data as $value) {
          $photo_no = $value->photo_no;
          // Add contents
          $zip->addFromString($photo_no.'.jpg', base64_decode($value->photo));
        }


        // Close and send to users
        $zip->close();



        header('Content-Type: application/zip');
        header('Content-Length: ' . filesize($file));
        header('Content-Disposition: attachment; filename="'.$company_name.' ( Selected ) File.zip"');
        readfile($file);
        unlink($file);

      }else{
        return back()->with(['notification_title'=>'Error', 'notification_type'=>'error', 'notification'=>'Please Select Any One Entry data']);
      }
    }

    public function download_images($lot_no){
      if(session('agent_id')&&session('customer_id')){

        $agent_id = session('agent_id');
        $customer_id = session('customer_id');

        $customer_info = admin_user::where('id', $customer_id)->get();
        $data = user_data_entry::where('status', 'Verified')->where('lot_submit', '1')->where('customer_id', $customer_id)->where('lot_no', $lot_no)->get();

        $file = tempnam("tmp", "zip");
        $zip = new ZipArchive();
        $zip->open($file, ZipArchive::OVERWRITE);

        foreach ($data as $value) {
          $photo_no = $value->photo_no;
          // Add contents
          $zip->addFromString($photo_no.'.jpg', base64_decode($value->photo));
          //$zip->addfile(Excel::download(new LotExport(2), '.xlsx')->getfile(), 'Master Data.xlsx');
        }


        // Close and send to users
        $zip->close();

        foreach ($customer_info as $value2) {
          $company_name = $value2->company_name;
        }

        header('Content-Type: application/zip');
        header('Content-Length: ' . filesize($file));
        header('Content-Disposition: attachment; filename="'.$company_name.'[ Lot '.$lot_no.' ] Images.zip"');
        readfile($file);
        unlink($file);
      }else{
        return back();
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       
    }
    
    public function change_status(Request $request, $id){
         $this->validate($request,[
          'status'=>'required|numeric|min:0|max:5',
        ]);
        
        
        $lot = lot_submission_log::find($id);
        $lot->status = $request->status;
        $result = $lot->save();
        if($result){
             return redirect()->back()->with(['notification'=>'Status Updated', 'notification_type'=>'success', 'notification_title'=>'Updated']);
        }
        return redirect()->back()->with(['notification'=>'Status Update Failed', 'notification_type'=>'error', 'notification_title'=>'Failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
