<?php

namespace App\Cropper;
use Illuminate\Support\Facades\Facade;

class SlimFacade extends Facade
{

  protected static function getFacadeAccessor()
  {
      return 'slim';
  }
}
