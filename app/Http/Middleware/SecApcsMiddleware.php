<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Session;
class SecApcsMiddleware
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
       if(Sentinel::check()&&Sentinel::getUser()->roles()->first()->slug=='secapcs'){
        return $next($request);
        }
        else
            Session::flash('message', 'We have sent you a verification email.Please check your email and verify it.');
            return redirect('/');
    }
}
