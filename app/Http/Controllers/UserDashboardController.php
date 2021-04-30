<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        \Session::put('url.intended',\Request::fullUrl());
        $this->middleware('auth');
    }

    public function home()
    {
        return view('user_dashboard.home');
    }

    public function account()
    {
        return view('user_dashboard.account');
    }

    public function get_account_details()
    {
        $get_account_details = User::where('phone',auth()->user()->phone)->where('status',1)->get();

        $response = array(
            'status'=>'Success',
            'response'=>$get_account_details[0]
        );

        return response()->json($response);
    }

    public function save_profile(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'=>'required|min:3'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $update_profile = User::where('phone',auth()->user()->phone)
                                    ->where('status',1)
                                    ->update([
                                        'name'=>$request['name'],
                                        'gender'=>($request['gender']!=null)?($request['gender'])?1:0:null,
                                        'email'=>$request['email']
                                    ]);

            if(!$update_profile)
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Please try again!'
                );
            }
            else
            {
                $response = array(
                    'status'=>'Success',
                    'response'=>'Profile updated successfully!'
                );
            }

            return response()->json($response);
        }
    }

    public function save_password(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'old_password'=>'required|max:255',
            'password'=>'required|confirmed|min:6'
          ]);

          if($validator->fails())
          {
              return response()->json(['errors'=>$validator->errors()]);
          }
          else
          {
            if(!\Hash::check($request->old_password,auth()->user()->password))
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Invalid Old Password'
                );
                
                return response()->json($response);
            }
            else
            {
                $update_password = User::where('phone',auth()->user()->phone)
                                                ->where('status',1)
                                                ->update([
                                                    'password'=>\Hash::make($request['password'])
                                                ]);

                if(!$update_password)
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Something went wrong, please try again.'
                    );
                }
                else
                {
                    $response = array(
                        'status'=>'Success',
                        'response'=>'Changes saved successfully.'
                    );
                }
                                            

                return response()->json($response);
            }
        }
    }

}
