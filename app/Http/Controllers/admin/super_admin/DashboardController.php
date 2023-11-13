<?php

namespace App\Http\Controllers\admin\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
      return view('admin.super_admin.dashboard');
    }
}
