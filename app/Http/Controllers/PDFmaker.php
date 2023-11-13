<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PDFmaker extends Controller
{
    //
    public function gen(){
      $pdf=App::make('dompdf.wrapper');
      $pdf->loadHTML('<h1>PDF</h1>')->setPaper('A4', 'portrait')->setWarnings(false);
      return $pdf->stream();
    }
}
