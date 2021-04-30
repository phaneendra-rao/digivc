<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\SuperAdmin;

class SuperAdminDashboardController extends Controller
{
    public function __construct()
    {
        \Session::put('url.intended',\Request::fullUrl());
        
        $this->middleware('auth:superadmin');
    }

    public function dashboard()
    {
        return view('superadmin_dashboard.dashboard');    
    }

    public function account()
    {
        return view('superadmin_dashboard.account');    
    }

    public function all_users()
    {
        return view('superadmin_dashboard.all-users');    
    }

    public function get_account_details()
    {
        $get_account_details = SuperAdmin::where('superadmin_id',auth()->user()->superadmin_id)->get();

        if(count($get_account_details)==1)
        {
            $response = array(
                'status'=>'Success',
                'response'=>$get_account_details[0]
            );
        }
        else
        {
            $response = array(
                'status'=>'Error',
                'response'=>'Please logout & login!'
            );
        }

        return response()->json($response);
    }

    public function save_profile(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'superadmin_id'=>'required|min:3',
            'name'=>'required|min:3',
            'email'=>'required|email', 
            'phone'=>'required|numeric|digits:10' 
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $update_profile = SuperAdmin::where('superadmin_id',auth()->user()->superadmin_id)
                                        ->update([
                                            'name'=>$request['name'],
                                            'phone'=>$request['phone'],
                                            'email'=>$request['email'],
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
                    'response'=>'Changes saved successfully!'
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
                $update_admin_password = SuperAdmin::where('superadmin_id',auth()->user()->superadmin_id)
                                                ->update([
                                                    'password'=>\Hash::make($request['password'])
                                                ]);

                if(!$update_admin_password)
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
