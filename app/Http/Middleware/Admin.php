<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Admin
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
        if (Auth::check()){
            // return $next($request);
            // if (!$this->auth->user()->isAdmin()){
            //  return redirect()->guest('signin');
            // }

            if (Auth::user()->role_id==1){
                
            }
            else{
                return abort(401, 'You are not authorized.');
            }
            
        }
        else{
            return redirect()->intended('login');
        }

        return $next($request);

    }
}
