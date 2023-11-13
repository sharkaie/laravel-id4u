<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App;
use App\Model\admin_user;
use App\Model\digital_form;
use App\Model\lot_submission_log;
use App\Model\form_field;
use App\Model\form_fields_log;
use App\Model\form_fields_option;
use App\Model\user_data_entry;


class Lotcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $customer_id = Auth::guard('admin')->user()->id;
          $lot = lot_submission_log::where('customer_id', $customer_id)->get();
          return view('admin.customer.data_lot.view', [ 'lots'=>$lot,  'customer_id'=>$customer_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $customer_id = Auth::guard('admin')->user()->id;
          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->get();
          $data = user_data_entry::where('status', 'Verified')->where('lot_submit', '1')->where('customer_id', $customer_id)->where('lot_no', $id)->get();
          if($data){
            return view('admin.customer.data_lot.show', [ 'lot_no'=>$id, 'fields'=>$fields, 'datas'=>$data]);
          }else{
            return view('admin.customer.data_lot.show', [ 'lot_no'=>$id, 'fields'=>$fields, 'datas'=>$data])->with(['notification'=>'Can\'t get any Data', 'notification_type'=>'error', 'notification_title'=>'Error']);
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
