<?php

namespace App\Http\Controllers\admin\agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\form_field;
use App\Model\form_fields_log;
use App\Model\form_fields_option;
use App\Model\user_data_entry;

class Fieldcontroller extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $id)->get();
        return view('admin.agent.fields.show', ['id'=>$id, 'fields'=>$fields]);

    }


    public function edit_option(Request $request,$id)
    {
      $chk = form_fields_option::find($id)->exists();
      if($chk==1){
        $request->validate([
          'option' => 'required'
        ]);
        $edit = form_fields_option::find($id);
        $edit->option_name = $request->option;
        $result = $edit->save();

        if($result){
          return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Edited', 'notification'=>'Option Edited Successfully']);
        }else{
          return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Edit']);
        }
      }else{
        return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Can\'t Edit Unexisted Option']);
      }
    }



    public function delete($id)
    {
        $result = form_fields_log::where('id', $id)->delete();
        if($result){
          return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Deleted', 'notification'=>'Field Deleted Successfully']);
        }else{
          return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Delete']);
        }
    }

    public function delete_option($id)
    {
        $result = form_fields_option::where('id', $id)->delete();
        if($result){
          return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Deleted', 'notification'=>'Field Deleted Successfully']);
        }else{
          return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Delete']);
        }

    }

    public function options_index($customer_id,$field_id){
      $options = form_fields_option::where('field_id', $field_id)->get();
      return view('admin.agent.fields.options.view', ['options'=>$options, 'field_id'=>$field_id, 'customer_id'=>$customer_id]);
    }

    public function options_store(Request $request, $field_id){
      $new_option = new form_fields_option;
      $new_option->option_name = $request->option_name;
      $new_option->field_id = $request->field_id;
      $result = $new_option->save();
      if($result){
        return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Deleted', 'notification'=>'Option Added Successfully']);
      }else{
        return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Add Option']);
      }
    }
}
