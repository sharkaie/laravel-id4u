<?php

namespace App\Http\Controllers\user;

use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Cropper\Slim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\admin_user;
use App\Model\digital_form;
use App\Model\form_field;
use App\Model\form_fields_log;
use App\Model\form_fields_option;
use App\Model\user_data_entry;

class data_formController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $form_id = session('form_id');
      if($form_id!=null){

      $find_form_id = user_data_entry::where('id', $form_id)->exists();
        if($find_form_id==1){
          $customer_id = Auth::user()->customer_id;
          $lot_meter = Auth::user()->lot_meter;
          
          $customer_info = admin_user::find($customer_id);
          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
          $field_options = form_fields_option::all();
          return view('user.digital_form', ['customer_info'=>$customer_info, 'fields'=>$fields, 'field_options'=>$field_options, 'form_id'=>$form_id,  'preview'=> 1]);
        }else{
          return redirect('/generate-new-id');
        }
      }else{
        return redirect('/generate-new-id');
      }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
      $form_id = session('form_id');
      if($form_id!=null){

        $find_form_id = user_data_entry::where('id', $form_id)->count();
        if($find_form_id==1){

          $customer_id = Auth::user()->customer_id;
          $lot_meter = Auth::user()->lot_meter;
          $customer_info = admin_user::find($customer_id);
          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
          
          $field_options = form_fields_option::all();
          $values = user_data_entry::where('id', $form_id)->get();

          return view('user.digital_form', ['customer_info'=>$customer_info, 'fields'=>$fields, 'field_options'=>$field_options, 'form_id'=>$form_id, 'values'=>$values,  'preview'=> 1]);
        }else{
          return redirect('/generate-new-id');
        }
      }else{
        return redirect('/generate-new-id');
      }

    }

    public function preview(){
      $form_id = session('form_id');
      if($form_id!=null){

        $find_form_id = user_data_entry::where('id', $form_id)->count();
        if($find_form_id==1){
          $customer_id = Auth::user()->customer_id;
          $lot_meter = Auth::user()->lot_meter;
          $customer_info = admin_user::find($customer_id);
          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
          $field_options = form_fields_option::all();
          $values = user_data_entry::find($form_id);
            $page_pass = $values->status;
          if($page_pass == 'Unverified'){
            return view('user.preview', ['customer_info'=>$customer_info, 'fields'=>$fields, 'field_options'=>$field_options, 'form_id'=>$form_id, 'data'=>$values]);
          }else{
            return redirect('/login');
          }

        }else{
          return redirect('/login');
        }
      }else{
        return redirect('/login');
      }
    }

    public function new_id(){
        session()->forget('form_id');

      $time = time();
      $customer_id = Auth::user()->customer_id;
      $lot_meter = Auth::user()->lot_meter;

      $data = new user_data_entry;
      $data->customer_id = $customer_id;
      $data->track_no = $time;
      $result = $data->save();
      if($result === true){
        $form_id = user_data_entry::where('track_no', $time)->pluck('id');
        $form_id = preg_replace("/[^0-9]/","",$form_id);
        if($form_id!=null){
          session(['form_id'=> $form_id]);
          return redirect('/digital-form');
        }else{
          return redirect('/error');
        }
      }else{
        return redirect('/error');
      }
    }

    public function new(Request $request)
    {

       $customer_id = Auth::user()->customer_id;
      $lot_meter = Auth::user()->lot_meter;
      $username = Auth::user()->username;

      $form_id = $request->form_id;

      if(session('form_id')){
        if($form_id == session('form_id')){
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
              $img_type = "image/png";
            }
          }
          
          

          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();
          $data = user_data_entry::find($form_id);
          $data->customer_id = $customer_id;
          $data->lot_no = $lot_meter;
          $data->photo = $img_data;
          $data->photo_no = $username."_".$form_id;
          $data->photo_type = $img_type;
          $data->status = 'Unverified';

          foreach ($fields as $field) {

            $field_name = $field->name;

            if($field->type == 'Date' || $field->type == 'Date_extended' ){
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
}
