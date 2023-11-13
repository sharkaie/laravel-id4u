<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Super_admin
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
        $role = Auth::guard('admin')->user()->role;
        if( $role == 'super_admin'){
          return $next($request);
        }else{
          return redirect('/');
        }

      }else{
        return redirect('/');
      }
    }
}
