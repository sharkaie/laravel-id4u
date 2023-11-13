<?php

namespace App\Http\Controllers\admin\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin_user;
use App\Model\form_field;
use Illuminate\Support\Facades\Hash;
use App\Model\digital_form;
use App\Model\form_fields_log;


class Formcontroller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(session('agent_id')){
        $agent_id = session('agent_id');
        $agents = admin_user::where('role', 'agent')->get();
        $agent_info = admin_user::find($agent_id);
        $digital_form = digital_form::where('agent_id',$agent_id)->get();

        return view('admin.super_admin.form.view', ['digital_forms'=>$digital_form,'agents'=>$agents,'agent_info'=>$agent_info, 'agent_id'=>$agent_id,'user_pass'=>1]);
      }else{
        $agents = admin_user::where('role', 'agent')->get();
        return view('admin.super_admin.form.view', ['agents'=>$agents,'user_pass'=>0]);
      }

    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create Digital Forms
        $agents = admin_user::where('role', 'agent')->get();
        $fields = form_field::where('status', '1')->orderBy('sequence', 'asc')->get();
        return view('admin.super_admin.form.create',['agents'=>$agents, 'fields'=>$fields]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $agent_id = $request->agent;
      $chk = digital_form::where('customer_id', $request->customer_id)->count();

      $this->validate($request,[
        'customer_id'=>'required',
        'form_username'=>'required',
        'duration'=>'required',
        'accept'=>'required'
      ]);

      if($chk==0){
        $h = array( "00" => 'a',
          "01" => 'b',
          "02" => 'c',
          "03" => 'd',
          "04" => 'e',
          "05" => 'f',
          "06" => 'g',
          "07" => 'h',
          "08" => 'i',
          "09" => 'j',
          "10" => 'k',
          "11" => 'm',
          "12" => 'n',
          "13" => 'p',
          "14" => 'q',
          "15" => 'r',
          "16" => 's',
          "17" => 't',
          "18" => 'u',
          "19" => 'v',
          "20" => 'w',
          "21" => 'x',
          "22" => 'y',
          "23" => 'z');

          $hour= date("H");

        $gen_pass = date("ym").$h[$hour].$request->customer_id;

        $password = Hash::make($gen_pass);

        if($request->duration != 'al_tm'){
          $current_date = date('d-m-Y');
          $ex_date = date('d-m-Y', strtotime($current_date.' + '.$request->duration.' days'));
        }else{
          $ex_date = 'al_tm';
        }

        $digital_form = new digital_form;
        $digital_form->customer_id = $request->customer_id;
        $digital_form->agent_id = $request->refered;
        $digital_form->username = $request->form_username;
        $digital_form->pass_id = $gen_pass;
        $digital_form->password = $password;
        $digital_form->expiry_date = $ex_date ;
        $result = $digital_form->save();

        if($result==1){

          foreach ($request->field_id as $fieldid) {
            $form_fields = new form_fields_log;
            $form_fields->customer_id = $request->customer_id;
            $form_fields->field_id = $fieldid;
            $result2 = $form_fields->save();
          }
          if($result2 == 1){
            $fresult=1;
          }
        }else{
          $fresult=0;
        }
        $fresult = '1';
      }else{
        $fresult = 'exist';
      }
      return $fresult;
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
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $chk = digital_form::find($id)->exists();

      if($chk == 1){
        $result = digital_form::find($id)->delete();
        if($result){
          return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Deleted', 'notification'=>'Digital Form Deleted Successfully']);
        }else{
          return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Delete']);
        }
      }else{
        return redirect()->back();
      }
    }
}
