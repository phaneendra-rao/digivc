<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class IsChannelPartner
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
        if(!Auth::guard('web')->check()){
            return redirect('/login');
        }

        if(Auth()->user()->account_type=='channel_partner'  && Auth()->user()->account_status==1)
        {
            return $next($request);
        }
        else
        {
            return redirect('/login');
        }
    }
}
