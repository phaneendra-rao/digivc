<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\User;
use App\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class MasterRoutesController extends Controller
{
    public function __construct()
    {
        \Session::put('url.intended',\Request::fullUrl());
    }

    protected function get_customer_wallet_balance($user_id)
    {
        // return $user_id;
        $incoming_credits = Wallet::where('user_id', $user_id)->where(function ($query) {
                                $query->where('trans_type', 1)->orWhere('trans_type', 2)->orWhere('trans_type', 7);
                            })->where('deleted_at', null)->sum('credits');

        $topup_credits = Wallet::where('wallets.user_id','=',$user_id)
                                    ->where('wallets.trans_type','=', 3)
                                    ->join('insta_mojo_transactions',function($join){
                                        $join->on('insta_mojo_transactions.wallet_id','=','wallets.id')->where('insta_mojo_transactions.payment_status','=',1);
                                    })
                                    ->sum('wallets.credits');

        $outgoing_credits = Wallet::where('user_id', $user_id)->where(function ($query) {
            $query->where('trans_type', 4)->orWhere('trans_type', 5)->orWhere('trans_type', 6);
        })->where('deleted_at', null)->sum('credits');

        return ($incoming_credits+$topup_credits) - $outgoing_credits;
    }

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

    public function dashboard()
    {
        return view('users.master.dashboard');
    }

    public function send_emails(Request $request)
    {

        // $fromName = 'Sudheer Sandra';
        // // $fromEmail = 's.phaneendrarao@gmail.com';
        // $fromEmail = 'sudheersandradigital@gmail.com';

        // $subject = '#SaveEarth Challenge - Environmental Change Maker Certificate';
        // $name = 'S Phaneendra rao';
        // $email = 'phaneendraraosuddapalli@gmail.com';
        // $sno = 1;
        // $body = array(
        //     'content'=>'<h4>Dear '.$name.', </h4>
        //     <p>Thank you for Making #SaveEarth Challenge a Grand Success.</p>
        //     <p>Thank you for Being an " Environmental Change Maker " here is the Certificate for Participating in the World Environment Day Campaign.</p>
        //     <p>I\'m also launching another Campaign tomorrow on the occasion of World Food Safety Day.</p>
        //     <p>I also thank our partners stumagz, Fountainhead Global school & Digital Connect.</p><br>
        //     <p><b>- Sudheer Sandra</b> <br> Psychologist, CEO, Mindify. <br> www.sudheersandra.com</p>');
            
        // Mail::send(['html'=>'emails.email_with_attachment'], $body, function($message) use($fromName, $fromEmail, $email, $subject, $sno){
        //     $message->to($email)
        //             ->from($fromEmail, $fromName)
        //             ->subject($subject);

        //     $message->attach(public_path('web_sources/Certificates').'/'.'Certificate-'.$sno.'.pdf');
        // });

        // return response()->json('hello it is working!');


        if($request->hasFile('sec_students'))
        {
            $file = $request->file('sec_students');

            $file = fopen($file->getRealPath(),"r");

            $flag = 0;
    
            while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE)
            {
                if($flag>=331 && $flag<=339)
                {
                    if(trim($filedata[0])!='' && trim($filedata[1])!='' && trim($filedata[2])!='')
                    {
                        $sno = $filedata[0];
                        $name = ucwords(trim($filedata[1]));
                        $email = strtolower(preg_replace('/\s+/', '', trim($filedata[2])));

                        $subject = '#SaveEarth Challenge - Environmental Change Maker Certificate';

                        $body = array(
                            'content'=>'<h4>Dear '.$name.', </h4>
                            <p>Thank you for Making #SaveEarth Challenge a Grand Success.</p>
                            <p>Thank you for Being an " Environmental Change Maker " here is the Certificate for Participating in the World Environment Day Campaign.</p>
                            <p>I\'m also launching another Campaign tomorrow on the occasion of World Food Safety Day.</p>
                            <p>I also thank our partners stumagz, Fountainhead Global school & Digital Connect.</p><br>
                            <p><b>- Sudheer Sandra</b> <br> Psychologist, CEO, Mindify. <br> www.sudheersandra.com</p>');

                        $fromEmail = 'teamsudheersandra@gmail.com';
                        $fromName = 'Sudheer Sandra';
    
                        Mail::send(['html'=>'emails.email_with_attachment'], $body, function($message) use($fromName, $fromEmail, $email, $subject, $sno){
                            $message->to($email)
                                    ->from($fromEmail, $fromName)
                                    ->subject($subject);

                            $message->attach(public_path('web_sources/Certificates').'/'.'Certificate-'.$sno.'.pdf');
                        });

                        // sleep(4);
                    }
                }

                $flag++;
            }
        }




        return response()->json(['hello it is done!']);

    }

    public function send_queue_emails(Request $request)
    {
        $file = fopen(public_path('web_sources/certificates_list.csv'),"r");

        $flag = 0;

        // Mail::queue('send', ['user' => $user], function($message) use ($file,$flag) {
            Mail::queue(['html'=>'emails.email_with_attachment'], function($message) use ($file,$flag) {
            while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE)
            {
                if($flag)
                {
                    // if($flag<=346)
                    if($flag==1)
                    {
                        if(trim($filedata[0])!='' && trim($filedata[2])!='' && trim($filedata[3])!='')
                        {
                            $sno = $filedata[0];
                            // $name = ucwords(trim($filedata[1]));
                            // $email = strtolower(preg_replace('/\s+/', '', trim($filedata[2])));
                            $name = 'Phaneendra rao';
                            $email = 'phaneendraraosuddapalli@gmail.com';
    
                            $subject = 'Participation Certificate for World day Against Child Labour - Sudheer Sandra';
    
                            $body = array(
                                'content'=>'<h4>Dear '.$name.', </h4>
                                <p>Thank you for Participating in Poster Competition on World day Against Child and Making it successful.</p>
                                <p>Here is the Certificate of Participation.</p>
                                <p>Thank you, <br> <b>- Sudheer Sandra</b> <br> Psychologist, CEO, Mindify. <br> www.sudheersandra.com</p>');
    
                            $fromEmail = 'teamsudheersandra@gmail.com';
                            $fromName = 'Sudheer Sandra';

                            $message->to($email)
                            ->from($fromEmail, $fromName)
                            ->subject($subject)
                            ->body($body)
                            ->attach(public_path('web_sources/Certificates').'/'.'Child Labour-'.$sno.'.pdf');
                            
                            // Mail::send(['html'=>'emails.email_with_attachment'], $body, function($message) use($fromName, $fromEmail, $email, $subject, $sno){

                            // });
    
                            // sleep(4);
                        }
                    }
                }
    
                $flag++;
    
            }
        });

        echo "done!";
    }

    public function account()
    {
    //    $created_at = Carbon::parse(auth()->user()->created_at)->setTimezone(auth()->user()->time_zone)->format('d-m-Y H:i:s');;

        return view('users.master.account');
    }

    public function all_users()
    {
        return view('users.master.all-users');
    }

    public function channel_partners()
    {
        return view('users.master.channel-partners');
    }

    public function coupons()
    {
        return view('users.master.coupons');
    }

    public function all_cards()
    {
        return view('users.master.all-cards');
    }

    public function view_single_user($user_id)
    {
        $user = User::where('id',$user_id)->where('account_type','customer')->count();

        if($user==1)
        {
            $wallet_balance = $this->get_customer_wallet_balance($user_id);

            return view('users.master.single-user', compact('user_id','wallet_balance'));
        }
        else
        {
            return redirect()->back()->with('error','Invalid URL!');
        }
    }

    public function view_single_channel_partner($user_id)
    {
        $user = User::where('id',$user_id)->where('account_type','channel_partner')->count();

        if($user==1)
        {
            $wallet_balance = $this->get_channel_partner_wallet_balance($user_id);

            return view('users.master.single-user', compact('user_id','wallet_balance'));
        }
        else
        {
            return redirect()->back()->with('error','Invalid URL!');
        }
    }
}
