<?php

namespace App\Http\Controllers\admin\agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin_user;

class selectioncontroller extends Controller
{
    //
    public function set_user(Request $request){
      $chk = admin_user::find($request->customer)->exists();
      if($chk==1){
      session()->forget('customer_id');
      $customer_id = $request->customer;
      if($customer_id!=null){
        session(['customer_id'=>$customer_id]);
      }
      return redirect()->back();
      }
    //  return redirect()->back();
    }
}
