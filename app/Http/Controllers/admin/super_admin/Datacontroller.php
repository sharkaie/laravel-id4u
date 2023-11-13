<?php

namespace App\Http\Controllers\admin\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\UnverifiedEnteries;
use Excel;
use App\Cropper\Slim;
use App\Model\admin_user;
use App\Model\digital_form;
use App\Model\lot_submission_log;
use App\Model\form_field;
use App\Model\form_fields_log;
use App\Model\form_fields_option;
use App\Model\user_data_entry;

class Datacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unverified(Request $request, $page = 1, $limit = '50')
    {
      if(session('agent_id') && session('customer_id')){
        $agent_id = session('agent_id');
        $customer_id = session('customer_id');
        $agents = admin_user::where('role', 'agent')->get();
        $agent_info = admin_user::find($agent_id);
        $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
        $case = 0;
        $search = array();
	$session_search = session('search')?  session('search'):array();
	$formX = 0;
if(isset($request->clear_filter) && $request->clear_filter == 'clear'){
		 session()->forget('search');
		}else{

        foreach ($fields as $field) {
          $field_nm = $field->name;
          if($field->type == 'Options' && isset($request->$field_nm)){
            $search[$field_nm] = $request->$field_nm;
	$formX = 1;	    
	$case = 1;	
          }
else if($field->type == 'Options' && array_key_exists($field_nm, $session_search) && $formX != 1){
		$search[$field_nm] = $session_search[$field_nm];
		$case = 1;
}        }}
	
	
	$startIndex = ($page - 1) * $limit;
	$pagesCount = 1;
$dataUnverifiedCount = 1;
        switch ($case) {
          case 1:
            session(['search'=>$search]);
            $data = user_data_entry::where(['status'=>'Unverified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->offset($startIndex)->limit($limit)->where($search)->get();
		$dataUnverifiedCount = user_data_entry::where(['status'=>'Unverified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->where($search)->count();
		$pagesCount = ceil($dataUnverifiedCount/$limit);
            break;

          default:
          session()->forget('search');
          //if($page != NULL){
          $data = user_data_entry::where(['status'=>'Unverified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->offset($startIndex)->limit($limit)->get();
          //}else{
            //$data = user_data_entry::where(['status'=>'Unverified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->get();
          //}
		$dataUnverifiedCount = user_data_entry::where(['status'=>'Unverified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->count();
            
		$pagesCount = ceil($dataUnverifiedCount/$limit);
		break;        
}

        $field_options = form_fields_option::all();

        $customer_info = admin_user::find($customer_id);

        if($case == 1){
          return view('admin.super_admin.data.unverified', ['search'=>$search,'options'=>$field_options, 'agents'=>$agents, 'agent_info'=>$agent_info, 'customer_info'=>$customer_info, 'fields'=>$fields, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'datas'=>$data, 'user_pass'=>1,'dataUnverifiedCount'=>$dataUnverifiedCount, 'page'=>$page, 'limit'=>$limit, 'pagesCount'=>$pagesCount]);
        }else{
          return view('admin.super_admin.data.unverified', ['options'=>$field_options,'agents'=>$agents, 'agent_info'=>$agent_info, 'customer_info'=>$customer_info, 'fields'=>$fields, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'datas'=>$data, 'user_pass'=>1, 'dataUnverifiedCount'=>$dataUnverifiedCount, 'page'=>$page, 'limit'=>$limit, 'pagesCount'=>$pagesCount]);
        }
        //return view('admin.super_admin.data.unverified', []);

      }else{
        $agents = admin_user::where('role', 'agent')->get();
        return view('admin.super_admin.data.unverified', ['user_pass'=>0,'agents'=>$agents]);
      }
        //show table sorted
    }

    public function unverified_export()
    {
      if(session('agent_id') && session('customer_id') ){
        $customer_id = session('customer_id');
        $customer = admin_user::find($customer_id);
        if(session('search')){
          $search = session('search');
          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
          $data = user_data_entry::where(['status'=>'Unverified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->where($search)->get();

          return view('exports.unverified_data', ['fields'=>$fields, 'datas'=>$data, 'search'=>$search, 'customer'=>$customer]);

        }else{
          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
          $data = user_data_entry::where(['status'=>'Unverified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->get();

          return view('exports.unverified_data', ['fields'=>$fields, 'datas'=>$data, 'customer'=>$customer]);
        }
      }else{
        redirect(route('data.unverified'));
      }
    }

    public function verified_export()
    {
      if(session('agent_id') && session('customer_id') ){
        $customer_id = session('customer_id');
        $customer = admin_user::find($customer_id);
        if(session('search')){
          $search = session('search');
          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
          $data = user_data_entry::where(['status'=>'Verified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->where($search)->get();

          return view('exports.verified_data', ['fields'=>$fields, 'datas'=>$data, 'search'=>$search, 'customer'=>$customer]);

        }else{
          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
          $data = user_data_entry::where(['status'=>'Verified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->get();

          return view('exports.verified_data', ['fields'=>$fields, 'datas'=>$data, 'customer'=>$customer]);
        }
      }else{
        redirect(route('data.unverified'));
      }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verified(Request $request, $page = NULL, $limit = '100')
    {
      if(session('agent_id') && session('customer_id')){
        $agent_id = session('agent_id');
        $customer_id = session('customer_id');
        $agents = admin_user::where('role', 'agent')->get();
        $agent_info = admin_user::where('id', $agent_id)->get();
        $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type','form_fields.label')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();

        $case = 0;
        $search = array();
        foreach ($fields as $field) {
          $field_nm = $field->name;
          if($field->type == 'Options' && $request->$field_nm!=''){
            $search[$field_nm] = $request->$field_nm;
            $case = 1;
          }
        }
	
	$startIndex = ($page - 1) * $limit;
	

        switch ($case) {
          case 1:
            session(['search'=>$search]);
            $dataVerifiedCount = user_data_entry::where(['status'=>'Verified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->where($search)->count();
		$data = user_data_entry::where(['status'=>'Verified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->where($search)->get();
            break;

          default:
		if($page != NULL){
		$data = user_data_entry::where(['status'=>'Verified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->offset($startIndex)->limit($limit)->get();
}else{
$data = user_data_entry::where(['status'=>'Verified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->get();
}
            
        	$dataVerifiedCount = user_data_entry::where(['status'=>'Verified', 'lot_submit'=> '0', 'customer_id'=>$customer_id])->count();
break;
	
        }

        $field_options = form_fields_option::all();

        $data_count = user_data_entry::where('status','Verified')->where('lot_submit', '0')->where('customer_id', $customer_id)->count();
        $customer_info = admin_user::where('id', $customer_id)->get();

        $chk1 =  DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type','form_fields.label')->where(['form_fields_logs.customer_id'=> $customer_id, 'form_fields.label'=>'category'])->orderby('sequence', 'asc')->count();
        $chk2 =  DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type','form_fields.label')->where(['form_fields_logs.customer_id'=> $customer_id, 'form_fields.label'=>'subcategory'])->orderby('sequence', 'asc')->count();

        $count_report = array();
        foreach ($fields as $field){
          foreach ($field_options as $field_option){

            if($chk1 == 1 && $chk2 ==1){
              // category & subcategory only
              if ($field->id == $field_option->field_id && $field->label=='category'){
                  $category = $field_option->option_name;
                  foreach ($fields as $fieldi){
                    foreach ($field_options as $field_optioni){
                      if ($fieldi->id == $field_optioni->field_id && $fieldi->label=='subcategory'){
                        $data_cout = user_data_entry::where('status','Verified')->where('lot_submit', '0')->where('customer_id', $customer_id)->where($field->name, $category)->where($fieldi->name, $field_optioni->option_name)->count();

                        array_push($count_report, $data_cout);

                      }
                    }
                  }
              }
            }elseif ($chk1 == 1) {
              // category only
              if ($field->id == $field_option->field_id && $field->label=='category'){
                $category = $field_option->option_name;
                $data_cout = user_data_entry::where(['status'=>'Verified', 'lot_submit'=>'0', 'customer_id'=>$customer_id, $field->name=>$category])->count();

                  array_push($count_report, $data_cout);

              }

            }elseif ($chk2 == 1) {
              // subcategory only
              if ($field->id == $field_option->field_id && $field->label=='subcategory'){
                $category = $field_option->option_name;
                $data_cout = user_data_entry::where(['status'=>'Verified', 'lot_submit'=>'0', 'customer_id'=>$customer_id, $field->name=>$category])->count();

                  array_push($count_report, $data_cout);

              }
            }
          }
        }


        if($case == 1){
          return view('admin.super_admin.data.verified', ['chk1'=>$chk1, 'chk2'=>$chk2, 'options'=>$field_options, 'agents'=>$agents, 'agent_info'=>$agent_info, 'customer_info'=>$customer_info, 'fields'=>$fields, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'datas'=>$data, 'dataVerifiedCount'=>$dataVerifiedCount, 'data_counts'=>$count_report, 'user_pass'=>'1']);
        }else{
          return view('admin.super_admin.data.verified', ['chk1'=>$chk1, 'chk2'=>$chk2, 'options'=>$field_options,'agents'=>$agents, 'agent_info'=>$agent_info, 'customer_info'=>$customer_info, 'fields'=>$fields, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'datas'=>$data,'dataVerifiedCount'=>$dataVerifiedCount, 'data_counts'=>$count_report, 'user_pass'=>1]);
        }

        // return view('admin.super_admin.data.verified', ['agents'=>$agents, 'agent_info'=>$agent_info, 'customer_info'=>$customer_info, 'fields'=>$fields, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'datas'=>$data, 'data_counts'=>$count_report, 'field_options'=>$field_options, 'user_pass'=>1]);

      }else{
        $agents = admin_user::where('role', 'agent')->get();
        return view('admin.super_admin.data.verified', ['user_pass'=>0,'agents'=>$agents]);
      }
        //show table sorted
    }

    public function change_st_verify(Request $request)
    {

      if($request->type == 'multiple'){
        $loop = 0;
        foreach ($request->entry_id as $id) {
        $data = user_data_entry::find($id);
        $data->status = 'Verified';
        $result = $data->save();
        $loop++;
        }
      }elseif($request->type == 'single'){
        $id = $request->entry_id;
        $data = user_data_entry::find($id);
        $data->status = 'Verified';
        $result = $data->save();
        $loop = 1;
      }
      if($result == '1'){
        $type = "success";
        $title = "Success";
        $notification = "$loop Entry Verified Successfully";
      }else{
        $type = "error";
        $title = "Failed";
        $notification = "Verification of Entry Failed";
      }

      return redirect('admin/data/unverified')->with(['notification_type'=> $type,'notification_title'=> $title,'notification'=> $notification]);
    }

    public function change_st_unverify(Request $request)
    {

      if(session('agent_id') && session('customer_id')){
        if($request->type == 'multiple'){
          $loop = 0;
          foreach ($request->entry_id as $id) {
          $data = user_data_entry::find($id);
          $data->status = 'Unverified';
          $result = $data->save();
          $loop++;
          }
        }elseif($request->type == 'single'){
          $id = $request->entry_id;
          $data = user_data_entry::find($id);
          $data->status = 'Unverified';
          $result = $data->save();
          $loop = 1;
        }
        if($result == '1'){
          $type = "success";
          $title = "Success";
          $notification = "$loop Entry Unverified Successfully";
        }else{
          $type = "error";
          $title = "Failed";
          $notification = "Unverification of Entry Failed";
        }
      }
      return redirect('admin/data/verified')->with(['notification_type'=> $type,'notification_title'=> $title,'notification'=> $notification]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(session('agent_id') && session('customer_id')){
        if($id!=null){

          $find_form_id = user_data_entry::where('id', $id)->count();
          if($find_form_id==1){

            $customer_id = session('customer_id');
            if($customer_id != null){
              session(['form_id_e'=>$id]);
              $customer_info = admin_user::where('id', $customer_id)->get();
              $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
              $field_options = form_fields_option::all();
              $values = user_data_entry::where('id', $id)->get();
            }else{
              return redirect()->back();
            }


            return view('admin.super_admin.data.edit', ['customer_info'=>$customer_info, 'fields'=>$fields, 'field_options'=>$field_options, 'form_id'=>$id, 'values'=>$values]);
          }else{
            return redirect()->back();
          }
        }else{
          return redirect()->back();
        }
      }else{
        $agents = admin_user::where('role', 'agent')->get();
        return view('admin.super_admin.data.unverified', ['user_pass'=>0,'agents'=>$agents]);
      }
    }

    public function getedit(Request $request){
      $customer_id = session('customer_id');

      $form_id = $request->form_id;
      if(session('form_id_e')){

        if($form_id == session('form_id_e')){
          if(!is_null($form_id)) {

          // Get posted data
          $images = Slim::getImages();

          // No image found under the supplied input name
          if ($images == false) {

              // inject your own auto crop or fallback script here
              return 'err_img';

          }
          else {
            foreach ($images as $image) {
              $img_data = base64_encode($image['output']['data']);
              $img_type = $image['output']['type'];
            }
          }

          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
          $data = user_data_entry::find($form_id);
          $data->customer_id = $customer_id;
          $data->photo = $img_data;
          $data->photo_type = $img_type;

          foreach ($fields as $field) {

            $field_name = $field->name;

            if($field->type == 'Date' || $field->type == 'Date_extended'){
              $dt = $field_name."dt";
              $mt = $field_name."mt";
              $yr = $field_name."yr";
              $dd = $request->$dt;
              $mm = $request->$mt;
              $yy = $request->$yr;
              $date = $dd.".".$mm.".".$yy;
              $data->$field_name = $date;
            }else{
              $data->$field_name = $request->$field_name;
            }
          }

          $result = $data->save();

            if($result == '1'){
              $pass = 1;
            }else{
              $pass = 0;
            }

           return $pass;
         }else{
           return 'err_expire';
         }

        }else{
          return 'err_expire';
        }

      }else{
        return 'err_expire';
      }
    }

    public function submit_lot(){
      if(session('agent_id') && session('customer_id')){
        $customer_id = session('customer_id');
        $user = digital_form::where('customer_id', $customer_id)->select('lot_meter', 'id')->get();
        foreach ($user as $value) {
          $lot_meter = $value->lot_meter;
          $form_id = $value->id;
        }
        $check = user_data_entry::where('lot_submit','0')->where('status', 'Verified')->where('customer_id', $customer_id)->count();
        if($check>0){
          $data = user_data_entry::where('lot_submit','0')->where('status', 'Verified')->where('customer_id', $customer_id)->select('id')->get();
          $loop = 0;
          foreach ($data as $res) {
            $submit_lot = user_data_entry::find($res->id);
            $submit_lot->lot_submit = '1';
            $submit_lot->lot_no = $lot_meter;
            $result = $submit_lot->save();
            $loop++;
          }

          $increment_lot = digital_form::find($form_id);
          $increment_lot->lot_meter = $lot_meter+1;
          $increment_lot->save();

          $lot_log_entery = new lot_submission_log;
          $lot_log_entery->customer_id = $customer_id;
          $lot_log_entery->lot_no = $lot_meter;
          $lot_log_entery->count = $loop;
          $result2 = $lot_log_entery->save();
          if($result2 == '1'){
            $type = "success";
            $title = "Submitted";
            $notification = "Lot no : $lot_meter ($loop) Submitted Successfully";
          }else{
            $type = "error";
            $title = "Failed";
            $notification = "Can't Submit Lot";
          }
          return redirect('admin/data/verified')->with(['notification_type'=> $type,'notification_title'=> $title,'notification'=> $notification]);
        }else{
          $type = "error";
          $title = "Failed";
          $notification = "No Data Available For Lot Submission";
          return redirect('admin/data/verified')->with(['notification_type'=> $type,'notification_title'=> $title,'notification'=> $notification]);
        }
      }else{
        return redirect('admin/login');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $row = user_data_entry::find($id);
      $row->status = 'trash';
      $result = $row->save();

        if($result == '1'){
          $type = "success";
          $title = "Deleted";
          $notification = "Entry ID : $id Deleted Successfully";

        }else{
          $type = "error";
          $title = "failed";
          $notification = "Delete process Failed";
        }

      return redirect()->back()->with(['notification_type'=> $type,'notification_title'=> $title,'notification'=> $notification]);
    }
}
