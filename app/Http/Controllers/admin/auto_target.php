<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class auto_target extends Controller
{
    public function run(){
      if(Auth::guard('admin')->Check()){
        $role =  Auth::guard('admin')->user()->role;
        switch ($role) {
          case 'super_admin':
            return redirect('admin/dashboard');
            break;

          case 'agent':
            return redirect('admin/a/dashboard');
            break;

          case 'customer':
            return redirect('admin/c/dashboard');
            break;
        }
      }else{
        return redirect('/');
      }
    }
}
