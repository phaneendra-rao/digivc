<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\User;
use App\Wallet;
use Carbon\Carbon;
use PragmaRX\Countries\Package\Countries;

class MasterChannelPartnerController extends Controller
{
    protected function get_channel_partner_wallet_balance($user_id)
    {
        $incoming_credits = Wallet::where('user_id', $user_id)->where(function ($query) {
                                $query->where('trans_type', 1)->orWhere('trans_type', 2)->orWhere('trans_type', 7);
                            })->where('deleted_at', null)->sum('credits');

        $topup_credits = Wallet::where('wallets.user_id','=',$user_id)
                                    ->where('wallets.trans_type','=', 3)
                                    // ->join('insta_mojo_transactions',function($join){
                                    //     $join->on('insta_mojo_transactions.wallet_id','=','wallets.id')->where('insta_mojo_transactions.payment_status','=',1);
                                    // })
                                    ->sum('wallets.credits');

        // $outgoing_credits = Wallet::where('user_id', $user_id)->where(function ($query) {
        //     $query->where('trans_type', 4)->orWhere('trans_type', 5)->orWhere('trans_type', 6);
        // })->where('deleted_at', null)->sum('credits');

        $outgoing_credits = 0;

        return ($incoming_credits+$topup_credits) - $outgoing_credits;
    }

    public function get_all_channel_partners(Request $request)
    {
        $columns = array( 
            0 =>'id',
            1 =>'full_name',
            2 =>'phone_no',
            3 =>'email',
            4 =>'country_name',
            5 =>'referral_code',
            6 =>'referred_by'
        );

        $totalData = User::where('account_type','channel_partner')->count();
            
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {
            $users = User::where('account_type','channel_partner')
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
        }
        else
        {
            $search = $request->input('search.value'); 

            $users =  User::where('account_type','channel_partner')
                                ->where(function($query) use($search){
                                    $query->Where('id','LIKE',"%{$search}%")
                                    ->orWhere('full_name', 'LIKE',"%{$search}%")
                                    ->orWhere('email', 'LIKE',"%{$search}%")
                                    ->orWhere('phone_no', 'LIKE',"%{$search}%")
                                    ->orWhere('country_name', 'LIKE',"%{$search}%")
                                    ->orWhere('referral_code', 'LIKE',"%{$search}%")
                                    ->orWhere('referred_by', 'LIKE',"%{$search}%");
                                })
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order,$dir)
                                ->get();

            $totalFiltered = User::where('account_type','channel_partner')
                                    ->where(function($query) use($search){
                                        $query->Where('id','LIKE',"%{$search}%")
                                        ->orWhere('full_name', 'LIKE',"%{$search}%")
                                        ->orWhere('email', 'LIKE',"%{$search}%")
                                        ->orWhere('phone_no', 'LIKE',"%{$search}%")
                                        ->orWhere('country_name', 'LIKE',"%{$search}%")
                                        ->orWhere('referral_code', 'LIKE',"%{$search}%")
                                        ->orWhere('referred_by', 'LIKE',"%{$search}%");
                                    })
                                    ->count();
        }

        $data = array();

        if(!empty($users))
        {
            $sno = $start+1;

            foreach ($users as $user)
            {
                $nestedData['sno'] = $sno;


                if($user->profile_pic != null)
                {
                    $profile_pic = $user->profile_pic;
                }
                else
                {
                    $profile_pic = $user->gender?'male_pic.png':'female_pic.png';
                }

                $name = '<a href="'.url('/').'/'.auth()->user()->account_type.'/channel_partner/'.$user->id.'" style="color:black;">
                <img class="img img-radius img-responsive" style="height:50px;width:50px;border-radius:50%;margin-right:5px;" src="'.asset('/sources/assets/images/users/profile_pics').'/'.$profile_pic.'" /> 
                '.ucfirst($user->full_name).' ('.$user->gender.') 
                <br><small>'.$user->email.'</small>
                <br><small>+'.$user->dail_code.''.$user->phone_no.' ('.$user->country_name.')</small>
                <br><small>Referral Code:'.$user->referral_code.'</small>
                <br><small>Referral By:'.$user->referred_by.'</small>
                <br><small>Joined at: '.Carbon::parse($user->created_at)->setTimezone(auth()->user()->time_zone)->toDayDateTimeString().'</small>
                </a>';

                $nestedData['name_email_phone_gender'] = $name;

                $nestedData['users'] = '<p><b>Users:</b> 10</p>';

                $nestedData['wallet_balance'] = '<b>₹ '.number_format($this->get_channel_partner_wallet_balance($user->id)).' /-</b>';

                $btn = (($user->account_status==1)?'<i style="font-size:1.2rem;cursor:pointer;color:green;" onclick="change_channel_partner_status(\''.$user->id.'\',\''.$user->account_status.'\')" class="fa fa-toggle-on"></i>':'<i style="font-size:1.2rem;cursor:pointer;color:red;" onclick="change_channel_partner_status(\''.$user->id.'\',\''.$user->account_status.'\')" class="fa fa-toggle-off"></i>');
                // $btn = $btn.'<span><i onClick="edit_user('.json_encode($user).')" style="font-size:1.6rem;cursor:pointer;color:orange;margin-left:5px;" class="fa fa-pencil-square"></i></span>';
                $btn = $btn.'<span><i onClick="delete_channel_partner(\''.$user->id.'\')" style="font-size:1.6rem;cursor:pointer;color:red;margin-left:15px;" class="fa fa-trash"></i></span>';

                $nestedData['action'] = $btn;

                $data[] = $nestedData;

                $sno++;
            }
        }
          
        $json_data = array(
                "draw"            => intval($request->input('draw')),  
                "recordsTotal"    => intval($totalData),  
                "recordsFiltered" => intval($totalFiltered), 
                "data"            => $data   
            );
    
        echo json_encode($json_data);
    }

    public function add_update_channel_partner(Request $request)
    {
        if($request['user_id']!=null)
        {
            $validator = \Validator::make($request->all(), [
                'user_id'=>'required',
                'full_name'=>'required|min:3',
                'email'=>'required|email', 
                'phone_no'=>'required',
                'dail_code'=>'required|numeric',
                'country_code'=>'required',
                'country_name'=>'required', 
                'gender'=>'required' ,
                'dob'=>'required|date',
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }
            else
            {
                $phone_no = str_replace(' ', '', $request['phone_no']);

                if(!is_numeric($phone_no))
                {
                    return response()->json(['errors'=>['phone_no'=>['Invalid Phone No!']]]);
                }

                $genders = array('m', 'f');

                if (!in_array($request['gender'], $genders)) {
                    return response()->json(['errors' => ['gender' => ['Invalid Gender!']]]);
                }

                if (User::where('id', '!=', intVal($request['user_id']))->where('phone_no', intVal($phone_no))->withTrashed()->count() == 0) {

                    $country_name = explode(" ",$request['country_name']);
                    $country_name = implode(" ",array_slice($country_name,-0,1));
                    $time_zone = Countries::where('name.common', $country_name)->first()->hydrate('timezones')->timezones->first()->zone_name;

                    $update_profile = User::where('id', $request['user_id'])
                        ->update([
                            'full_name' => $request['full_name'],
                            'gender' => $request['gender'],
                            'email' => $request['email'],
                            'dob' => date('Y-m-d', strtotime($request['dob'])),
                            'phone_no'=>$phone_no,
                            'dail_code'=>$request['dail_code'],
                            'country_code'=>$request['country_code'],
                            'country_name'=>$request['country_name'],
                            'time_zone'=>$time_zone
                        ]);

                    if (!$update_profile) {
                        $response = array(
                            'status' => 'Error',
                            'response' => 'Please try again!'
                        );
                    } else {
                        $response = array(
                            'status' => 'Success',
                            'response' => 'Profile updated successfully!'
                        );
                    }
                } else {
                    $response = array(
                        'status' => 'Error',
                        'response' => 'Phone no already taken!'
                    );
                }

                return response()->json($response);
            }
        }
        else
        {
            $validator = \Validator::make($request->all(), [
                'full_name'=>'required|min:3',
                'email'=>'required|email', 
                'phone_no'=>'required|numeric|unique:users',
                'dail_code'=>'required|numeric',
                'country_code'=>'required',
                'country_name'=>'required', 
                'gender'=>'required' ,
                'dob'=>'required|date',
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }
            else
            {
                $top_up_credits = 0;

                if (preg_match("/^[0-9,]+$/", $request['top_up_credits'])) {
                    $top_up_credits = str_replace(',', '', $request['top_up_credits']);
                } else {
                    $top_up_credits = $request['top_up_credits'];
                }

                \DB::beginTransaction();

                try
                {
                    $country_name = explode(" ",$request['country_name']);
                    $country_name = implode(" ",array_slice($country_name,-0,1));
                    $time_zone = Countries::where('name.common', $country_name)->first()->hydrate('timezones')->timezones->first()->zone_name;

                    $user = User::create([
                        'account_type'=>'channel_partner',
                        'full_name'=>strtolower($request['full_name']),
                        'email'=>(trim($request['email'])!='')?strtolower($request['email']):null,
                        'phone_no'=>$request['phone_no'],
                        'gender'=>$request['gender'],
                        'dob'=>date('Y-m-d',strtotime($request['dob'])),
                        'dail_code'=>$request['dail_code'],
                        'country_code'=>$request['country_code'],
                        'country_name'=>$request['country_name'],
                        'time_zone'=>$time_zone,
                        'referred_by'=>'direct',
                        'account_status'=>1,
                        'password'=>($request['password']!=null)?\Hash::make($request['password']):\Hash::make($request['phone_no'])
                    ]);

                    if($top_up_credits>0)
                    {
                        Wallet::create([
                            'user_id'=>$user->id,
                            'trans_type'=>3, // channel partner top-up credits
                            'credits'=>$top_up_credits
                        ]);
                    }



                    if(trim($request['email'])!='')
                    {
                        $emailId = trim(strtolower($request['email']));
    
                        // SEND WELCOME EMAIL

                        if($top_up_credits>0)
                        {
                            // SEND MAIL REGARDING TOP UP CREDITS
                            // $subject = '₹100 added to your new account! - Digivc';
                            $subject = number_format($top_up_credits).' free credits got added to your new account! - Digivc';
                            $body = array(
                                'logo'=>'<img src="'.url('/web_sources/images/logo.png').'" style="max-height:60px;width:auto;" alt="Digivc Logo">',
                                // 'content'=>'<h4>Hello '.ucfirst($request['full_name']).'</h4><p>Click the link below to activate your Digivc account:</p><br><a href="'.url('/activate_account').'/'.$final_verification_code.'">'.url('/activate_account').'/'.$final_verification_code.'</a>'
                                // 'content'=>'<h4>Hello '.ucfirst($request['full_name']).'</h4><p>Congratulations! ₹100 got added to your New Digivc Account.</p><p>Login to your new account to Shop Digivc Products using those amount!</p>'
                                'content'=>'<h4>Hello '.ucfirst($request['full_name']).'</h4><p>'.number_format($top_up_credits).' credits got added to your New Digivc Account.</p><p>Login to your account and use them to on board users!</p>'
                            );
        
                            send_email($emailId,$subject,$body);
                        }
                    }
    
    
                    // start sending welcome sms
    
                    if($top_up_credits>0)
                    {
                        // start sending top up credits sms
                        $msg = 'Hello '.ucwords($request['full_name']).', '.number_format($top_up_credits).' credits got added to your New Digivc Account. Login to your account and use them to on board users. Go through https://digivc.com to know more. Thank you.';
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
                        'response'=>'Channel partner added successfully!'
                    );
                }
                catch (\Exception $e)
                {
                    \DB::rollback();

                    $response = array(
                        'status'=>'Error',
                        'response'=>'Please try again!',
                    );
                }

                return response()->json($response);
            }
        }
    }

    public function change_channel_partner_status(Request $request)
    {
        $id = $request['user_id'];
        $status = $request['status'];

        if($status==1)
        {
            $status=0;
        }
        else if($status==0)
        {
            $status=1;
        }

        \DB::beginTransaction();

        try
        {
            User::where('id',$id)->update([
                'account_status'=>$status
            ]);

            // send account activation or deactivation mail and sms

            if($status==1)
            {
                $response = array(
                    'status'=>'Success',
                    'response'=>'Account activated successfully!'
                );
            }
            else if($status==0)
            {
                $response = array(
                    'status'=>'Success',
                    'response'=>'Account deactivated successfully!'
                );
            }

            \DB::commit();
        }
        catch (\Exception $e)
        {
            $response = array(
                'status'=>'Error',
                'response'=>'Please try again!'
            );

            \DB::rollback();
        }

        return response()->json($response);
    }

    public function delete_channel_partner(Request $request)
    {
        \DB::beginTransaction();

        try
        {
           $get_user = User::where('id',$request['user_id'])->get();

            if(count($get_user)==1)
            {
                // Card::where('user_id',$request['user_id'])->delete();

                User::where('id',$request['user_id'])->delete();
                Wallet::where('user_id',$request['user_id'])->delete();

                $response = array(
                    'status'=>'Success',
                    'response'=>'User & cards deleted successfully!'
                );

                // send account deletion sms and mail to user
            }
            else
            {
                $response = array(
                    'status'=>'Warning',
                    'response'=>'No records found!'
                );                

                \DB::rollback();
            }
            
            \DB::commit();
        } 
        catch (\Exception $e)
        {
            $response = array(
                'status'=>'Error',
                'response'=>'Please try again!'
            );

            \DB::rollback();
        }

        return response()->json($response);
    }

    public function get_single_channel_partner(Request $request)
    {
        $user_id = $request['user_id'];

        $user = User::where('id',$user_id)->where('account_type','channel_partner')->get();

        if(count($user)==1)
        {
            $response = array(
                'status'=>'Success',
                'response'=>$user[0]
            );
        }
        else
        {
            $response = array(
                'status'=>'Warning',
                'response'=>'No records found!'
            );
        }

        return response()->json($response);
    }

    public function change_channel_partner_profile_pic(Request $request)
    {
        $user_id = $request['id'];
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name= time().'.png';
        $path = public_path() . "/sources/assets/images/users/profile_pics/".$image_name;

        file_put_contents($path, $data);

        $update_profile_pic = User::where('id',$user_id)
                            ->update([
                                'profile_pic'=>$image_name
                            ]);

        if(!$update_profile_pic)
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
                'response'=>'Successfully updated profile pic!'
            );
        }
                   
        return response()->json($response);
    }

    public function delete_channel_partner_profile_pic(Request $request)
    {
        $delete_pic = User::where('id',$request['id'])
                                ->update([
                                    'profile_pic'=>null
                                ]);

        if(!$delete_pic)
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
                'response'=>'Profile pic removed successfully!'
            );
        }

        return response()->json($response);
    }
}
