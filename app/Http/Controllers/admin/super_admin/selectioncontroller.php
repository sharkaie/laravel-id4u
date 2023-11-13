<?php

namespace App\Http\Controllers\admin\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin_user;

class selectioncontroller extends Controller
{
    //
    public function set_user(Request $request){
      session()->forget('agent_id');
      session()->forget('customer_id');
      $agent_id = $request->agent;
      $customer_id = $request->customer;
      if($agent_id!=null && $customer_id!=null){
        session(['agent_id'=> $agent_id, 'customer_id'=>$customer_id]);
      }
      return redirect()->back();
    }

    public function set_agent(Request $request){
      session()->forget('agent_id');
      session()->forget('customer_id');
      $agent_id = $request->agent;
      if($agent_id!=null){
        session(['agent_id'=> $agent_id]);
      }
      return redirect()->back();
    }
}
