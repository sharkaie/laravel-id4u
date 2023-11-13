<?php

namespace App\Imports;

use App\Model\user_data_entry;
use App\Model\form_field;
use App\Model\admin_user;
use App\Model\digital_form;
use App\Model\lot_submission_log;
use App\Model\form_fields_log;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class DataEnteriesImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {HeadingRowFormatter::default('none');
      $role = Auth::guard('admin')->user()->role;
      switch ($role) {
        case 'customer':
          $customer_id = Auth::guard('admin')->user()->id;

          break;

        case 'agent':
          $customer_id = session('customer_id');
          break;

        case 'super_admin':
          $customer_id = session('customer_id');
          break;
      }

      $time = time();
      $digital = digital_form::where('customer_id',$customer_id)->get();
      foreach ($digital as $value) {
       $lot_meter =  $value->lot_meter;
       $username =  $value->username;
      }

      $data = new user_data_entry;
      $data->customer_id = $customer_id;
      $data->track_no = $time;
      $result = $data->save();

      $form_id = user_data_entry::where('track_no', $time)->pluck('id');


        foreach ($rows as $row)
        {
          $fields = DB::table('form_fields')->join('form_fields_logs', 'form_fields.id', 'form_fields_logs.field_id')->select('form_fields_logs.id','form_fields_logs.field_id','form_fields.name','form_fields.type')->where('form_fields_logs.customer_id', $customer_id)->orderby('sequence', 'asc')->get();

            $data = user_data_entry::find($form_id);
            $data->customer_id = $customer_id;
            $data->lot_no = $lot_meter;
            $data->photo = "";
            $data->photo_no = $username."_".$form_id;
            $data->photo_type = "";
            $data->status = 'Unverified';
            foreach ($fields as $field) {
              $field_name = $field->name;
              $data->$field_name = $row[$field_name];
            }
            $data->save();
        }
    }
}
