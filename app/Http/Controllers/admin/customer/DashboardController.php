<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      return view('admin.customer.dashboard');
    }
}
