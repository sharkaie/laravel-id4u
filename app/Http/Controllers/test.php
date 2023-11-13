<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{
    //
    public function index()
    {
      if(session('n1')&&session('n4')){

      }else {
        session(['n1'=>'ses1','n2'=>'ses2','n3'=>'ses3', 'n4'=>'ses4']);
        echo "refresh";
      }
    }

    public function index2()
    {
      echo session('n1')."<br />";
      echo session('n2')."<br />";
      echo session('n3')."<br />";
      echo session('n4')."<br />";
      echo session('data')."<br />";
      echo session('data2')."<br />";
      // if(Session::get('track_id')){
      //   $data = Session::get('track_id');
      //   echo "session ok : track id = $data";
      //
      // }else {
      //   Session::put('track_id', '1');
      //   echo "refresh";
      // }
    }
}
