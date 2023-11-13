<?php

namespace App\Http\Controllers\admin\super_admin;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //main fieldmanage page
          $fields = form_field::orderBy('sequence', 'ASC')->orderBy('name', 'ASC')->where('status','1')->get();
          $count = form_field::count();
          $active = form_field::where('status', '1')->count();
        return view('admin.super_admin.fields.view',['fields'=>$fields, 'count'=>$count, 'active'=>$active]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Add New Field To Form
        $this->validate($request,[
          'field_name'=>'required',
          'field_type'=>'required',
          'where'=>'required',
          'label'=>'nullable'
        ]);

        $field_name = str_replace(" ", "_", $request->field_name);
        // $field_name = preg_replace('/[^A-Za-z_]/', '', $field_name);
        

        $exist_check = form_field::where('name', $field_name)->doesntExist();
        if($exist_check){

        $track_no = time();
        $store = new form_field;
        $store->track_no = $track_no;
        $out = $store->save();

        if($out == 1){
          $find = form_field::where('track_no', $track_no)->limit(1)->get();
          foreach($find as $value){
            $dummy_id=$value->id;
          }

          switch ($request->where) {
            case 'at_beginning':
              $modifer = form_field::where(['status'=>'1'])->orderBy('sequence', 'asc')->get();
                foreach ($modifer as $field) {
                  $id = $field->id;
                    $tb = form_field::find($id);
                    $e_seq = $tb->sequence + 1;
                    $tb->sequence = $e_seq;
                    $tb->save();
                }
                $field = form_field::find($dummy_id);
                $field->sequence = '1';
                $field->name = $field_name;
                $field->type = $request->field_type;
                $field->label = $request->label;
                $field->status = '1';
                $result = $field->save();
              break;

            case 'at_end':
              $field = form_field::find($dummy_id);
              $field->sequence = $dummy_id;
              $field->name = $field_name;
              $field->type = $request->field_type;
              $field->label = $request->label;
              $field->status = '1';
              $result = $field->save();
              break;
            default:
              $position_arr = explode("_",$request->where);
              $id = $position_arr['1'];
              $chk = form_field::find($id);
              $ids = $chk->sequence;
              $checker = form_field::find($id)->exists();
              if($checker){

                $modifer = form_field::where('status','1')->orderBy('sequence', 'asc')->get();
                foreach ($modifer as $field) {
                  $idf = $field->id;
                  $idfs = $field->sequence;
                  if($idfs>$ids){
                    $tb = form_field::find($idf);
                    $e_seq = $tb->sequence + 1;
                    $tb->sequence = $e_seq;
                    $tb->save();
                  }
                }

                $field_o = form_field::find($id);
                $old_seq = $field_o->sequence;
                $new_seq = $old_seq+1;
                $field = form_field::find($dummy_id);
                $field->sequence = $new_seq;
                $field->name = $field_name;
                $field->type = $request->field_type;
                $field->label = $request->label;
                $field->status = '1';
                $result = $field->save();

              }else{
                $result = false;
              }
              break;
          }

          if($result){
            // SHOW COLUMNS FROM table_name
            $column_exist = DB::select("SHOW COLUMNS FROM form_fields Like '$field_name'");
            if(empty($column_exist)){
              $data_input_field = DB::statement("ALTER TABLE user_data_entries ADD $field_name TEXT(200) NULL AFTER photo_type");
            }

            return redirect(route('field.index'))->with(['notification_type'=>'success', 'notification_title'=>'Created', 'notification'=>'Field Created Successfully']);
          }else{
            return redirect(route('field.index'))->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Create Field']);
          }
        }else{
          return redirect(route('field.index'))->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Create Field']);
        }
      }else{
        return redirect(route('field.index'))->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Field Already Exist']);
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
        //
        $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $id)->orderBy('sequence', 'asc')->get();
        return view('admin.super_admin.fields.show', ['id'=>$id, 'fields'=>$fields]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $field_name = str_replace(" ", "_", $request->field_name);
    //   $field_name = preg_replace('/[^A-Za-z_]/', '', $field_name);
      

        
      $chk = form_field::find($id)->exists();
      $old = form_field::find($id);
      $old_field = $old->name;
      if($chk==1){

        $check = form_field::where(['id'=>$id, 'name'=>$field_name])->doesntExist();

        switch ($request->where) {
          case 'at_beginning':
            $modifer = form_field::where(['status'=>'1'])->orderBy('sequence', 'asc')->get();
              foreach ($modifer as $field) {
                $ids = $field->id;
                  $tb = form_field::find($ids);
                  $e_seq = $tb->sequence + 1;
                  $tb->sequence = $e_seq;
                  $tb->save();
              }
              $field = form_field::find($id);
              $field->sequence = '1';
              $field->name = $field_name;
              $field->type = $request->field_type;
              $field->label = $request->label;
              $field->status = '1';
              $result = $field->save();
            break;

          default:
            $position_arr = explode("_",$request->where);
            $idp = $position_arr['1'];
            $chk = form_field::find($idp);
            $ids = $chk->sequence;
            $checker = form_field::find($idp)->exists();
            if($checker){

              $modifer = form_field::where('status','1')->orderBy('sequence', 'asc')->get();
              foreach ($modifer as $field) {
                $idf = $field->id;
                $idfs = $field->sequence;
                if($idfs>$ids){
                  $tb = form_field::find($idf);
                  $e_seq = $tb->sequence + 1;
                  $tb->sequence = $e_seq;
                  $tb->save();
                }
              }

              $field_o = form_field::find($idp);
              $old_seq = $field_o->sequence;
              $new_seq = $old_seq+1;
              $field = form_field::find($id);
              $field->sequence = $new_seq;
              $field->name = $field_name;
              $field->type = $request->field_type;
              $field->label = $request->label;
              $field->status = '1';
              $result = $field->save();

            }else{
              $result = false;
            }
            break;
        }

        // $edit = form_field::find($id);
        // $edit->name = $field_name;
        // $edit->type = $request->field_type;
        // $result = $edit->save();

        if($result){

          if($check){
            $data_input_field = DB::statement("ALTER TABLE user_data_entries CHANGE $old_field $field_name TEXT(200) NULL ");
          }

          return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Edited', 'notification'=>'Field Edited Successfully']);
        }else{
          return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Edit']);
        }
      }else{
        return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Field really not Exists']);
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
      //  $get = form_field::find($id);
      //  $field_name = $get->name;
      //  $new_name = $field_name."-trash".$id;
        $result = form_field::where('id', $id)->delete();
        if($result){
          //$data_input_field = DB::statement("ALTER TABLE user_data_entries CHANGE $field_name `$new_name` VARCHAR(200) NOT NULL DEFAULT 'Empty'");
          return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Deleted', 'notification'=>'Field Deleted Successfully']);
        }else{
          return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Delete']);
        }
        return redirect()->back();
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
      return view('admin.super_admin.fields.options.view', ['options'=>$options, 'field_id'=>$field_id, 'customer_id'=>$customer_id]);
    }

    public function options_store(Request $request, $field_id){
      $new_option = new form_fields_option;
      $new_option->option_name = $request->option_name;
      $new_option->field_id = $request->field_id;
      $result = $new_option->save();

      return redirect()->back();
    }
}
