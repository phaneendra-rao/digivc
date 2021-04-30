<?php

use App\User;
use App\Wallet;
use App\Counsellor;
use App\SuperAdmin;
use App\UserOtp;

function preString($length = 3) {
    $str = "";
    $characters = array_merge(range('A','Z'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

function otp_generation($phone_number,$for)
{
    UserOtp::where('phone',$phone_number)->update([
        'status'=>0
    ]);

    // $pre_string = preString();
    $otp = substr(number_format(time() * rand(),0,'',''),0,6);

    $store_otp = UserOtp::create([
        'phone'=>$phone_number,
        'otp'=>$otp
    ]); 


    $msg = $for.' - '.$otp.' Thank you.';
    
    $data = "userid=".env("PRIMARY_SMS_USERID", "igniteiasotp")."&password=".env("PRIMARY_SMS_PWD", "123456")."&sender=".env("PRIMARY_SMS_SENDER_ID", "IGNITE")."&mobileno=".$phone_number."&msg=".$msg;


    $ch = curl_init('http://trans.msg360.in/websms/sendsms.aspx');

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    if(!$store_otp)
    {
        return array('status'=>'Error','response'=>'Something went wrong, please try again!');
    }
    else
    {
        return array('status'=>'Success', 'response'=>'OTP Sent Successfully!');
    }
}

function send_sms($name,$phone_number,$email,$message,$to_phone)
{
    $msg = 'Hey! you got a message from '.$name.' ('.$phone_number.') - ('.$email.'), message is: '.$message.' Thank you.';
    
    $data = "userid=".env("PRIMARY_SMS_USERID", "igniteiasotp")."&password=".env("PRIMARY_SMS_PWD", "123456")."&sender=".env("PRIMARY_SMS_SENDER_ID", "IGNITE")."&mobileno=".$to_phone."&msg=".$msg;
    // $data = "userid=eamcetrank&password=123456&sender=EAMRNK&mobileno=919573210866&msg=".$msg;


    $ch = curl_init('http://trans.msg360.in/websms/sendsms.aspx');

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    // return array('status'=>'Success', 'response'=>'OTP Sent Successfully!');

}
 
function share_card_sms($name,$designation,$company_name,$slug,$phone)
{
    $link = url($slug);
    $msg = 'Hi! I\'m '.$name.', '.$designation.' of '.$company_name.'. Here is my Digital Visiting Card: '.$link.' , Please get in touch anytime - Thank you.';
    
    $data = "userid=".env("PRIMARY_SMS_USERID", "igniteiasotp")."&password=".env("PRIMARY_SMS_PWD", "123456")."&sender=".env("PRIMARY_SMS_SENDER_ID", "IGNITE")."&mobileno=".$phone."&msg=".$msg;
    // $data = "userid=eamcetrank&password=123456&sender=EAMRNK&mobileno=919573210866&msg=".$msg;


    $ch = curl_init('http://trans.msg360.in/websms/sendsms.aspx');

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
}

function send_email($emailId,$subject,$body)
{
    $fromName = 'Digivc';
    $fromEmail = 's.phaneendrarao@gmail.com';
        
    \Mail::send(['html'=>'emails.mail'], $body, function($message) use($fromName, $fromEmail, $emailId, $subject){
        $message->to($emailId)
                ->from($fromEmail, $fromName)
                ->subject($subject);
    });
}

function get_customer_wallet_balance($user_id)
{
    $incoming_credits = Wallet::where('user_id', $user_id)->where(function ($query) {
        $query->where('trans_type', 1)->orWhere('trans_type', 2)->orWhere('trans_type', 7)->orWhere('trans_type', 8);
    })->where('deleted_at', null)->sum('credits');

    $topup_credits = Wallet::where('wallets.user_id','=',$user_id)
                            ->where('wallets.trans_type','=', 3)
                            ->join('insta_mojo_transactions',function($join){
                                $join->on('insta_mojo_transactions.wallet_id','=','wallets.id')->where('insta_mojo_transactions.payment_status','=',1);
                            })
                            ->sum('wallets.credits');

    $outgoing_credits = Wallet::where('user_id', $user_id)->where(function ($query) {
        $query->where('trans_type', 4)->orWhere('trans_type', 5)->orWhere('trans_type', 6)->orWhere('trans_type', 9);
    })->where('deleted_at', null)->sum('credits');

    return $my_credits = ($incoming_credits+$topup_credits) - $outgoing_credits;
}

