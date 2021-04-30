<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Wallet;
use App\UserOtp;
use App\Enquiry;

use PragmaRX\Countries\Package\Countries;



class GeneralController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('user_logout');
    }

    public function index()
    {
        return view('web_pages.index');
    }

    public function about()
    {
        return view('web_pages.about');
    }

    public function features()
    {
        return view('web_pages.features');
    }

    public function pricing()
    {
        return view('web_pages.pricing');
    }

    public function contact()
    {
        return view('web_pages.contact');
    }

    public function contact_send_message(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'=>'required|min:3',
            'phone'=>'required|numeric',
            'message'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $store_message = Enquiry::create([
                'name'=>$request['name'],
                'phone'=>$request['phone'],
                'email'=>$request['email'],
                'subject'=>$request['subject'],
                'message'=>$request['message']
            ]);

            if(!$store_message)
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
                    'response'=>'Message sent successfully!'
                );
            }

            return response()->json($response);
        }           
    }

    public function login()
    {
        return view('web_pages.login');
    }

    public function signup()
    {
        return redirect('/direct/signup');
    }

    public function referral_signup($referral_code)
    {
        return view('web_pages.signup',compact('referral_code'));
    }

    protected function verification_code()
    {
        $verification_code = preString(24);

        if(User::where('verification_code',$verification_code)->count())
        {
            $this->verification_code();
        }
        else
        {
            return $verification_code;
        }
    }

    public function register_user(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'full_name'=>'required|min:3', 
            // 'email'=>'required|email',
            'phone_no'=>'required|numeric|unique:users',
            'country_code'=>'required',
            'dail_code'=>'required',
            'country_name'=>'required', 
            'gender'=>'required', 
            'dob'=>'required|date',
            'password'=>'required|confirmed|min:6',
            'terms_and_conditions'=>'required',
            'referred_by'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $genders = array('m','f');

            if(!in_array($request['gender'],$genders))
            {
                return response()->json(['errors'=>['gender'=>['Invalid Gender!']]]);
            }

            if(User::where('referral_code',$request['referred_by'])->count()==1)
            {
                $referred_by = $request['referred_by'];
            }
            else
            {
                $referred_by = 'direct';
            }

            $final_verification_code = $this->verification_code();

            $country_name = explode(" ",$request['country_name']);
            $country_name = implode(" ",array_slice($country_name,-0,1));
            $time_zone = Countries::where('name.common', $country_name)->first()->hydrate('timezones')->timezones->first()->zone_name;

            \DB::beginTransaction();

            try {
               $user = User::create([
                            'full_name'=>strtolower($request['full_name']),
                            'email'=>(trim($request['email'])!='')?strtolower($request['email']):null,
                            'phone_no'=>$request['phone_no'],
                            'gender'=>$request['gender'],
                            'dob'=>date('Y-m-d',strtotime($request['dob'])),
                            'dail_code'=>$request['dail_code'],
                            'country_code'=>$request['country_code'],
                            'country_name'=>$request['country_name'],
                            'time_zone'=>$time_zone,
                            'referred_by'=>$referred_by,
                            'sms_credits'=>env("SIGNUP_SMS_CREDITS"),
                            'password'=>\Hash::make($request['password']),
                            'verification_code'=>$final_verification_code
                        ]);

                if(env("SIGNUP_CREDITS")>0)
                {
                    Wallet::create([
                        'user_id'=>$user->id,
                        'trans_type'=>1, // new account signup amount
                        'credits'=>env("SIGNUP_CREDITS")
                    ]);
                }


                
                if(trim($request['email'])!='')
                {
                    $emailId = trim(strtolower($request['email']));

                    // SEND MAIL REGARDING ACTIVATION ACCOUNT
                    $subject = 'Digivc account activation link';
                    $body = array(
                        'logo'=>'<img src="'.url('/web_sources/images/logo.png').'" style="max-height:60px;width:auto;" alt="Digivc Logo">',
                        // 'content'=>'<h4>Hello '.ucfirst($request['full_name']).'</h4><p>Click the link below to activate your Digivc account:</p><br><a href="'.url('/activate_account').'/'.$final_verification_code.'">'.url('/activate_account').'/'.$final_verification_code.'</a>'
                        'content'=>'<h4>Hello '.ucfirst($request['full_name']).'</h4><p>Click the link below to activate your Digivc account:</p><br><a style="position: relative; line-height: 24px; color: #ffffff; font-size: 14px; cursor: pointer; font-weight: 400; border-radius: 0px; letter-spacing: 1px; padding: 19px 62px 19px; text-transform: uppercase; box-shadow: 0px 10px 25px rgba(255,91,0,0.1); background-image: -ms-linear-gradient(left, #ff5b00 0%, #ff8e00 100%); background-image: -moz-linear-gradient(left, #ff5b00 0%, #ff8e00 100%); background-image: -o-linear-gradient(left, #ff5b00 0%, #ff8e00 100%); background-image: -webkit-gradient(linear, left top, right top, color-stop(0, #ff5b00), color-stop(100, #ff8e00)); background-image: -webkit-linear-gradient(left, #ff5b00 0%, #ff8e00 100%); background-image: linear-gradient(to right, #ff5b00 0%, #ff8e00 100%);" href="'.url('/activate_account').'/'.$final_verification_code.'">Activate account!</a>'
                    );
    
                    send_email($emailId,$subject,$body);

                    if(env("SIGNUP_CREDITS")>0)
                    {
                        // SEND MAIL REGARDING FREE CREDITS
                        // $subject = '₹100 added to your new account! - Digivc';
                        $subject = env("SIGNUP_CREDITS", 100).' free credits got added to your new account! - Digivc';
                        $body = array(
                            'logo'=>'<img src="'.url('/web_sources/images/logo.png').'" style="max-height:60px;width:auto;" alt="Digivc Logo">',
                            // 'content'=>'<h4>Hello '.ucfirst($request['full_name']).'</h4><p>Click the link below to activate your Digivc account:</p><br><a href="'.url('/activate_account').'/'.$final_verification_code.'">'.url('/activate_account').'/'.$final_verification_code.'</a>'
                            // 'content'=>'<h4>Hello '.ucfirst($request['full_name']).'</h4><p>Congratulations! ₹100 got added to your New Digivc Account.</p><p>Login to your new account to Shop Digivc Products using those amount!</p>'
                            'content'=>'<h4>Hello '.ucfirst($request['full_name']).'</h4><p>Congratulations! '.env("SIGNUP_CREDITS", 100).' free credits got added to your New Digivc Account.</p><p>Login to your account and use them to Shop Digivc Products!</p>'
                        );

                        send_email($emailId,$subject,$body);
                    }
                }


                // start sending activation account link sms
                $msg = 'Hello '.ucwords($request['full_name']).', Click the link below to activate your Digivc account: '.url('/activate_account').'/'.$final_verification_code.' Thank you.';
                $data = "userid=".env("PRIMARY_SMS_USERID", "igniteiasotp")."&password=".env("PRIMARY_SMS_PWD", "123456")."&sender=".env("PRIMARY_SMS_SENDER_ID", "IGNITE")."&mobileno=+".$request['dail_code'].''.$request['phone_no']."&msg=".$msg;           
                //send the POST request with curl
                $ch = curl_init('http://trans.msg360.in/websms/sendsms.aspx');            
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);

                if(env("SIGNUP_CREDITS")>0)
                {
                    // start sending free credits sms
                    $msg = 'Hello '.ucwords($request['full_name']).', Congratulations! '.env("SIGNUP_CREDITS", 100).' free credits got added to your New Digivc Account. Login to your account and use them to Shop Digivc Products! Go through https://digivc.in to know more. Thank you.';
                    $data = "userid=".env("PRIMARY_SMS_USERID", "igniteiasotp")."&password=".env("PRIMARY_SMS_PWD", "123456")."&sender=".env("PRIMARY_SMS_SENDER_ID", "IGNITE")."&mobileno=+".$request['dail_code'].''.$request['phone_no']."&msg=".$msg;
                    //send the POST request with curl
                    $ch = curl_init('http://trans.msg360.in/websms/sendsms.aspx');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    curl_close($ch);
                }

                if(env("SIGNUP_SMS_CREDITS")>0)
                {
                    // start sending free sms credits sms
                    $msg = 'Hello '.ucwords($request['full_name']).', Congratulations! '.env("SIGNUP_SMS_CREDITS").' free SMS credits got added to your New Digivc Account. Login to your account and use them on your Digivc Cards! Go through https://digivc.in to know more. Thank you.';
                    $data = "userid=".env("PRIMARY_SMS_USERID", "igniteiasotp")."&password=".env("PRIMARY_SMS_PWD", "123456")."&sender=".env("PRIMARY_SMS_SENDER_ID", "IGNITE")."&mobileno=+".$request['dail_code'].''.$request['phone_no']."&msg=".$msg;
                    //send the POST request with curl
                    $ch = curl_init('http://trans.msg360.in/websms/sendsms.aspx');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    curl_close($ch);
                }

                \DB::commit();

                $response = array(
                    'status'=>'Success',
                    'response'=>[
                        'title'=>'Registered successfully!',
                        'text'=>'Please click verification link sent to your phone and email to activate account!'
                    ]
                );

            } catch (\Exception $e) {

                \DB::rollback();

                $response = array(
                    'status'=>'Error',
                    'response'=>'Please try again!',
                    'e'=>$e
                );
            }

            return response()->json($response);
        }
    }

    public function activate_account($verification_code)
    {
        if(User::where('verification_code',$verification_code)->count())
        {
            \DB::beginTransaction();

            try {
                User::where('verification_code',$verification_code)->update([
                    'account_status'=>1,
                    'verification_code'=>null
                ]);

                \DB::commit();

                return redirect('/login')->with('success','Account activated successfully!');

            } catch (\Exception $e) {
                \DB::rollback();
                return redirect('/')->with('error','Please try again!');
            }
        }
    }

    public function user_login(Request $request)
    {
        $get_user = User::select('account_type')->where('phone_no',$request['phone_no'])->where('account_status',1)->where('deleted_at',null)->get();

        if(count($get_user)==1)
        {
            $credentials = array(
                'phone_no' => $request['phone_no'],
                'password' => $request['password']
            );

            if(Auth::attempt($credentials))
            {
                if(\Session::get('url.intended')!=null)
                {
                    $redirect_url = \Session::get('url.intended');    
                }
                else
                {
                    \Session::put('url.intended',url("/".$get_user[0]->account_type."/dashboard"));

                    $redirect_url = \Session::get('url.intended');
                }

                return redirect($redirect_url)->with('success','Successfully logged in!');
            }        

            return redirect('/login')->with('error','Invalid Credentials!');
        }
        else
        {
            return redirect('/login')->with('error','Invalid Credentials!');
        }
    }

    public function forgot_password(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'phone_no'=>'required|numeric'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $get_user = User::select('full_name','email','dail_code')->where('phone_no',$request['phone_no'])->where('account_status',1)->where('deleted_at',null)->get();
    
            if(count($get_user)==1)
            {
                $final_verification_code = $this->verification_code();

                if($final_verification_code!=null)
                {
                    User::where('phone_no',$request['phone_no'])->update([
                        'verification_code'=>$final_verification_code,
                        'verification_code_date_time'=>date('Y-m-d H:i:s')
                    ]);

                    if(trim($get_user[0]->email)!='')
                    {
                        $emailId = $get_user[0]->email;
                        $subject = 'Digivc - Password reset link';
        
                        $body = array(
                            'logo'=>'<img src="'.url('/web_sources/images/logo.png').'" style="max-height:60px;width:auto;" alt="Digivc Logo">',
                            // 'content'=>'<h4>Hello '.ucfirst($request['full_name']).'</h4><p>Click the link below to activate your Digivc account:</p><br><a href="'.url('/activate_account').'/'.$final_verification_code.'">'.url('/activate_account').'/'.$final_verification_code.'</a>'
                            'content'=>'<h4>Hello '.ucfirst($get_user[0]->full_name).'</h4><p>Click the link below to reset your Digivc account password:</p><br><a style="position: relative; line-height: 24px; color: #ffffff; font-size: 14px; cursor: pointer; font-weight: 400; border-radius: 0px; letter-spacing: 1px; padding: 19px 62px 19px; text-transform: uppercase; box-shadow: 0px 10px 25px rgba(255,91,0,0.1); background-image: -ms-linear-gradient(left, #ff5b00 0%, #ff8e00 100%); background-image: -moz-linear-gradient(left, #ff5b00 0%, #ff8e00 100%); background-image: -o-linear-gradient(left, #ff5b00 0%, #ff8e00 100%); background-image: -webkit-gradient(linear, left top, right top, color-stop(0, #ff5b00), color-stop(100, #ff8e00)); background-image: -webkit-linear-gradient(left, #ff5b00 0%, #ff8e00 100%); background-image: linear-gradient(to right, #ff5b00 0%, #ff8e00 100%);" href="'.url('/reset_password').'/'.$final_verification_code.'">Reset Password!</a>'
                        );
        
                        send_email($emailId,$subject,$body);
                    }
    
                    // start sending sms to forgot password
                    $msg = 'Hello '.ucwords($get_user[0]->full_name).', Click the link below to reset your Digivc account password: '.url('/reset_password').'/'.$final_verification_code.' Thank you.';
                    $data = "userid=".env("PRIMARY_SMS_USERID", "igniteiasotp")."&password=".env("PRIMARY_SMS_PWD", "123456")."&sender=".env("PRIMARY_SMS_SENDER_ID", "IGNITE")."&mobileno=+".$get_user[0]->dail_code.''.$request['phone_no']."&msg=".$msg;
                
                    //send the POST request with curl
                    $ch = curl_init('http://trans.msg360.in/websms/sendsms.aspx');
                
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    curl_close($ch);

                    $response = array(
                        'status'=>'Success',
                        'response'=>'Password reset link sent successfully!'
                    );

                    return response()->json($response);
                }
                else
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Something went wrong, please try again!'
                    );
    
                    return response()->json($response);                    
                }
            }
            else
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Invalid Hallticket No!'
                );

                return response()->json($response);
            }
        }
    }

    public function reset_password($verification_code)
    {   
        $check_verification_code = User::where('verification_code',$verification_code)->where('account_status',1)->get();

        if(count($check_verification_code)==1)
        {
            $code_created = strtotime($check_verification_code[0]->verification_code_date_time);
            $time_now = strtotime(date('Y-m-d H:i:s'));

            $interval  = abs($time_now - $code_created);
            $minutes   = round($interval / 60);

            if($minutes>10)
            {
                User::where('verification_code',$verification_code)
                        ->update([
                            'verification_code'=>null,
                            'verification_code_date_time'=>null
                        ]);

                return redirect('/login')->with('error','Link expired, Please try again!');                    
            }
            else
            {
                return view('web_pages.reset_password',compact('verification_code'));
            }
        }
        else
        {
            return redirect('/login')->with('error','Invalid URL');
        }
    }

    public function reset_new_password(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'verification_code'=>'required|min:24',
            'password'=>'required|confirmed|min:6' 
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $verification_code = $request['verification_code'];

            $check_verification_code = User::where('verification_code',$verification_code)->where('account_status',1)->get();

            if(count($check_verification_code)==1)
            {
                $code_created = strtotime($check_verification_code[0]->verification_code_date_time);
                $time_now = strtotime(date('Y-m-d H:i:s'));
    
                $interval  = abs($time_now - $code_created);
                $minutes   = round($interval / 60);
    
                if($minutes>10)
                {
                    User::where('verification_code',$verification_code)
                            ->update([
                                'verification_code'=>null,
                                'verification_code_date_time'=>null
                            ]);
    
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Link expired, Please try again!'
                    );
                }
                else
                {
                    User::where('id',$check_verification_code[0]->id)
                        ->update([
                            'password'=>\Hash::make($request['password']),
                            'verification_code'=>null,
                            'verification_code_date_time'=>null
                        ]);

                    $response = array(
                        'status'=>'Success',
                        'response'=>'Password changed successfully!'
                    );
                }
            }
            else
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Invalid URL!'
                );
            }

            return response()->json($response);
        }
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
 