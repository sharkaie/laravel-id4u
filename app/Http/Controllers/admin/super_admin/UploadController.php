<?php

namespace App\Http\Controllers\admin\super_admin;

use App\Http\Controllers\Controller;
use App\Imports\DataEnteriesImport;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App;
use PDF;
use Image;
use App\Exports\ExampleExport;
use App\Cropper\Slim;
use App\Model\admin_user;
use App\Model\digital_form;
use App\Model\lot_submission_log;
use App\Model\form_field;
use App\Model\form_fields_log;
use App\Model\form_fields_option;
use App\Model\user_data_entry;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

HeadingRowFormatter::default('none');

use Excel;


class UploadController extends Controller
{
    //
    public function excel(){
      if(session('customer_id') && session('agent_id')){
        $agents = admin_user::where('role', 'agent')->get();
        $agent_id = session('agent_id');
        $customer_id = session('customer_id');
        $customer = admin_user::find($customer_id);
        $agent_info = admin_user::find($agent_id);
        return view('admin.super_admin.upload.excel', ['user_pass'=>1, 'agent_info'=>$agent_info, 'customer'=>$customer, 'agents'=>$agents]);
      }else{
        $agents = admin_user::where('role', 'agent')->get();
        return view('admin.super_admin.upload.excel', ['user_pass'=>0, 'agents'=>$agents]);
      }

    }







    public function photos(Request $request){
      if(session('customer_id') && session('agent_id')){

        $agents = admin_user::where('role', 'agent')->get();
        $agent_id = session('agent_id');
        $customer_id = session('customer_id');
        $customer = admin_user::find($customer_id);
      $customer_id = session('customer_id');
      $customers = admin_user::where(['role'=>'customer','agent_refered'=>$agent_id])->get();
      $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->get();

      $case = 0;
      $search = array();
      foreach ($fields as $field) {
        $field_nm = $field->name;
        if($field->type == 'Options' && $request->$field_nm!=''){
          $search[$field_nm] = $request->$field_nm;
          $case = 1;
        }
      }



      switch ($case) {
        case 1:
        session(['search'=>$search]);
          $data = user_data_entry::where(['status'=>'Unverified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->where('photo', null)->where($search)->get();
          break;

        default:
        session()->forget('search');
          $data = user_data_entry::where(['status'=>'Unverified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->where('photo', null)->get();
          break;
      }

      $field_options = form_fields_option::all();

      if($case == 1){
        return view('admin.super_admin.upload.photos', ['agents'=>$agents,'user_pass'=>1,'search'=>1, 'customer'=>$customer, 'customers'=>$customers, 'search_data'=>$search, 'options'=>$field_options, 'fields'=>$fields, 'data'=>$data]);
      }else{
        return view('admin.super_admin.upload.photos', ['agents'=>$agents,'user_pass'=>1,'search'=>0, 'customer'=>$customer, 'customers'=>$customers,'options'=>$field_options,  'fields'=>$fields, 'data'=>$data]);
      }


      }else{
        $agents = admin_user::where('role', 'agent')->get();
        $agent_id = Auth::guard('admin')->user()->id;
        $customers = admin_user::where(['role'=>'customer','agent_refered'=>$agent_id])->get();
        return view('admin.super_admin.upload.photos', ['agents'=>$agents, 'user_pass'=>0, 'customers'=>$customers]);
      }
    }


    public function upload_excel(Request $request){
      if(session('customer_id') && session('agent_id')){

      $this->validate($request,[
        'excel_data'=>'required|mimes:xls,xlsx'
      ]);

      $extension = $request->excel_data->extension();

      $customer_id = session('customer_id');
      $path = $request->file('excel_data')->getRealPath();
      $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();

      switch ($extension) {
        case 'xls':
          $headings = (new HeadingRowImport)->toArray($path, null, \Maatwebsite\Excel\Excel::XLS);
          break;

        case 'xlsx':
          $headings = (new HeadingRowImport)->toArray($path, null, \Maatwebsite\Excel\Excel::XLSX);
          break;
      }

      foreach ($headings as $values) {
        foreach($values as $value){
          $val_row = array();
          $j = count($value);

          $loop = 1;
            foreach ($fields as $field) {
              $val = $loop++;
              $field_name = $field->name;

              for ($i=0; $i <$j ; $i++) {
                if($value[$i] == $field_name){
                  array_push($val_row, $field_name);
                }
              }
            }


            $l = count($val_row);

            if($val != $l){
              return redirect()->back()->with(['notification'=>'Excel is Invalid', 'notification_title'=>'Failed' , 'notification_type'=>'error']);
            }
        }
      }
      switch ($extension) {
        case 'xls':
          Excel::import(new DataEnteriesImport, $path, null, \Maatwebsite\Excel\Excel::XLS);
          break;

        case 'xlsx':
          Excel::import(new DataEnteriesImport, $path, null, \Maatwebsite\Excel\Excel::XLSX);
          break;
      }

      $notification_title = session('n_title');
      $notification_type = session('n_type');
      $notification = session('n');

      return redirect()->back()->with(['notification'=>$notification, 'notification_title'=>$notification_title , 'notification_type'=>$notification_type]);
      }
    }

    public function upload_photos(Request $request){
      if(session('customer_id') && session('agent_id')){
        
      $customer_id = session('customer_id');
      $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->get();
      $data = user_data_entry::where(['status'=>'Unverified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->where('photo', null)->get();
      $i = 0;
      foreach ($data as $row) {

        $in_name = "photo_".$row->id;
        if(isset($request->$in_name)){
          $images = Slim::getImages($in_name);

          // No image found under the supplied input name
          if ($images == false) {
              return redirect()->back()->with(['notification'=>'Error Unauthorized', 'notification_type'=>'error', 'notification_title'=>'Error']);
          }
          else {

            foreach ($images as $image) {

              $img_data = base64_encode($image['output']['data']);
              $img_type = $image['output']['type'];
              $id = $row->id;
              $usern = digital_form::where('customer_id', $customer_id)->select('username')->limit(1)->get();
              foreach ($usern as $username) {
                $username = $username['username'];
              }
              $update = user_data_entry::find($id);
              $update->photo = $img_data;
              $update->photo_no = $username."_".$id;
              $update->save();
              $i++;
            }
          }

        }

      }
      if($i>0){
        return redirect()->back()->with(['notification'=>'Photos Added Successfully', 'notification_type'=>'success', 'notification_title'=>'Inserted']);
      }else{
        return redirect()->back()->with(['notification'=>'No Photos Found', 'notification_type'=>'warning', 'notification_title'=>'404']);
      }
    }else{
      return redirect()->back();
    }
    }

    public function photos_cropped(Request $request){

      if(session('customer_id') && session('agent_id')){
        $agents = admin_user::where('role', 'agent')->get();
        $agent_id = session('agent_id');
        $customer_id = session('customer_id');
        $customers = admin_user::where(['role'=>'customer','agent_refered'=>$agent_id])->get();
        $customer = admin_user::find($customer_id);

        return view('admin.super_admin.upload.photo_crop_upload', ['user_pass'=>1, 'customer'=>$customer, 'agents'=>$agents]);
      }else{
        $agents = admin_user::where('role', 'agent')->get();
        $agent_id = session('agent_id');
        $customers = admin_user::where(['role'=>'customer','agent_refered'=>$agent_id])->get();
        return view('admin.super_admin.upload.photo_crop_upload', ['user_pass'=>0, 'agents'=>$agents]);
      }

    }

    public function upload_photos_cropped(Request $request){
      if(session('customer_id') && session('agent_id')){
      $error = array();
      $i = 0;
      $customer_id = session('customer_id');
      $digital = digital_form::where('customer_id', $customer_id)->limit(1)->get();
      foreach ($digital as $key) {
        $username = $key->username;
      }
      foreach ($request->cropped_data as $img_temp) {

        $cropped_image = 'data:image/png;base64,' . base64_encode(file_get_contents($img_temp));
        $image = Image::make($cropped_image)->resize(327, 400)->encode('png');
        $img = new \Imagick();
        $img->readImageBlob($image);
        $img->setImageResolution(118.111,118.111);
        $img->setImageFormat("png");
        $blob = $img->getImageBlob();
        $blob = base64_encode($blob);
        $img_name = $img_temp->getClientOriginalName();
        $img_name = explode(".",$img_name);
        $entry = user_data_entry::where('photo_no',$img_name[0])->exists();
        $data = user_data_entry::where(['photo_no'=>$img_name[0], 'customer_id'=>$customer_id])->limit(1)->get();

        foreach($data as $value){
          $form_id = $value->id;
        }

        if($entry){

          $data = user_data_entry::find($form_id);
          $data->photo = $blob;
          $data->photo_no = $username."_".$form_id;
          $data->save();
          array_push($error, 1);
        }else{
          array_push($error, 0);
        }
        $i++;
      }

      $counter = array_sum($error);


      if($counter == $i){
        return redirect()->back()->with(['notification'=>'Photos Added Successfully', 'notification_type'=>'success', 'notification_title'=>'Inserted']);
      }else{
        return redirect()->back()->with(['notification'=>'Error While Uploading images', 'notification_type'=>'error', 'notification_title'=>'Failed']);
      }
      //print_r($request->cropped_data);
    }else{
      return redirect()->back();
    }
    }

    public function example(){
      if(session('customer_id') && session('agent_id')){
        $customer_id = session('customer_id');
        return (new ExampleExport($customer_id))->download('Blank Excel'.'.xlsx');
      }else{
        return redirect()->back();
      }
    }


}
