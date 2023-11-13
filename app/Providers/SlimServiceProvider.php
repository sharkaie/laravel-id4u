<?php

namespace App\Providers;

use App\Cropper\Slim;
use Illuminate\Support\ServiceProvider;

class SlimServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('slim', function(){
          return new Slim();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
