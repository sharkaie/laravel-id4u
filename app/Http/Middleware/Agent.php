<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Agent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(Auth::guard('admin')->Check()){

        if(Auth::guard('admin')->user()->role == 'agent'){
          return $next($request);
        }else{
          return redirect('/');
        }

      }else{
        return redirect('/');
      }
    }
}
