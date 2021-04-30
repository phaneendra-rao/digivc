<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class IsAuth
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
        // if(!Auth::guard('web')->check()){
        //     return redirect('/login');
        // }
        // else
        // {

        // }

        if(Auth::check())
        {
            if(Auth()->user()->account_type=='master'  && Auth()->user()->account_status==1)
            {
                return redirect('/master/dashboard');
            }
            else if(Auth()->user()->account_type=='customer' && Auth()->user()->account_status==1)
            {
                return redirect('/customer/dashboard');
            }
            else if(Auth()->user()->account_type=='channel_partner' && Auth()->user()->account_status==1)
            {
                return redirect('/channel_partner/dashboard');
            }
            else
            {
                return $next($request);
            }
        }
        else
        {
            // return redirect('/login');

            return $next($request);
        }
    }
}
