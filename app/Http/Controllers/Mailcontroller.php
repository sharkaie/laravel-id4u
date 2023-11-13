<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccessful;

class Mailcontroller extends Controller
{
    //
    public function mail(){
      $request = array('email' => 'vedantby@gmail.com', 'contact'=> '123456879', 'firstname'=>'Vedant' );
      $result = Mail::to('vedantby@gmail.com')->send(new RegistrationSuccessful($request));
      if($result)
      {
        echo "Mail Sent";
      }else{
        echo "Mail not Sent";
      }
    }
}
