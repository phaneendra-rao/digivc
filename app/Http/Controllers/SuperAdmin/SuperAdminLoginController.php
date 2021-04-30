<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SuperAdminLoginController extends Controller
{
    protected $redirectTo = '/superadmin/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('superadmin_logout');
    }

    public function redirectPath()
    {
        return \Session::get('url.intended') ? \Session::get('url.intended') : $this->redirectTo;
    }

    public function attempt_login(Request $request)
    {
        $credentials = $request->only('superadmin_id','password');

        if (Auth::guard('superadmin')->attempt($credentials))
        {
            return redirect()->intended($this->redirectPath())->with('success','Successfully logged in!');
        }

        return redirect('superadmin/login')->with('error','Invalid Credentials!');
    }

    public function superadmin_logout()
    {
        if(Auth::guard('superadmin')->check())
        {
            Auth::guard('superadmin')->logout();

            return redirect('superadmin/login')->with('success','Successfully Logged Out!');
        }

        return redirect('superadmin/login');
    }

}
