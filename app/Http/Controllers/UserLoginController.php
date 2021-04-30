<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;


class UserLoginController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('user_logout');
    }

    public function redirectPath()
    {
        return \Session::get('url.intended') ? \Session::get('url.intended') : $this->redirectTo;
    }

    public function attempt_login(Request $request)
    {
        // $credentials = $request->only('phone','password');

        if (Auth::attempt(['phone'=>$request['phone'],'password'=>$request['password'], 'status'=>1]))
        {
            return redirect()->intended($this->redirectPath())->with('success','Successfully logged in!');
        }

        return redirect('/login')->with('error','Invalid Credentials!');
    }

    public function user_logout()
    {
        if(Auth::check())
        {
            Auth::logout();

            return redirect('/login')->with('success','Successfully Logged Out!');
        }

        return redirect('/login');
    }
}
