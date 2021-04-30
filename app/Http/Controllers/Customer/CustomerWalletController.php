<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\InstaMojoTransaction;
use Illuminate\Http\Request;

use App\User;
use App\Wallet;
use Carbon\Carbon;

class CustomerWalletController extends Controller
{
    public function get_current_credits()
    {
        $incoming_credits = Wallet::where('user_id', auth()->user()->id)->where(function ($query) {
            $query->where('trans_type', 1)->orWhere('trans_type', 2)->orWhere('trans_type', 7)->orWhere('trans_type', 8);
        })->where('deleted_at', null)->sum('credits');

        $topup_credits = Wallet::where('wallets.user_id','=',auth()->user()->id)
                                ->where('wallets.trans_type','=', 3)
                                ->join('insta_mojo_transactions',function($join){
                                    $join->on('insta_mojo_transactions.wallet_id','=','wallets.id')->where('insta_mojo_transactions.payment_status','=',1);
                                })
                                ->sum('wallets.credits');

        $outgoing_credits = Wallet::where('user_id', auth()->user()->id)->where(function ($query) {
            $query->where('trans_type', 4)->orWhere('trans_type', 5)->orWhere('trans_type', 6);
        })->where('deleted_at', null)->sum('credits');

        $my_credits = ($incoming_credits+$topup_credits) - $outgoing_credits;

        $response = array(
            'status' => 'Success',
            'response' => $my_credits
        );

        return response()->json($response);
    }

    public function get_wallet_transactions(Request $request)
    {
        $page = $request['page'];
        $get_trans = Wallet::where('user_id',auth()->user()->id)->skip($page*10)->limit(10)->orderBy('id','desc')->get();

        $next_page = Wallet::select('id')->where('user_id',auth()->user()->id)->skip(($page+1)*10)->limit(10)->orderBy('id','desc')->get();

        if(count($get_trans))
        {
            $final_trans = array();

            foreach ($get_trans as $tran) {
                if($tran->trans_type==1 || $tran->trans_type==2 || $tran->trans_type==4 || $tran->trans_type==5 || $tran->trans_type==6 || $tran->trans_type==8 || $tran->trans_type==9)
                {
                    array_push($final_trans,[
                        'type'=>intVal($tran->trans_type),
                        'credits'=>$tran->credits,
                        'date_time'=>Carbon::parse($tran->created_at)->setTimezone(auth()->user()->time_zone)->toDayDateTimeString()
                        ]);
                }
                else if($tran->trans_type==3) // top-up credits
                {
                    $insta_mojo_trans = InstaMojoTransaction::where('wallet_id',$tran->id)->get();

                    if(count($insta_mojo_trans)==1)
                    {
                        array_push($final_trans,[
                            'type'=>intVal($tran->trans_type),
                            'credits'=>$tran->credits,
                            'payment_id'=>$insta_mojo_trans[0]->payment_id,
                            'payment_status'=>$insta_mojo_trans[0]->payment_status,
                            'date_time'=>Carbon::parse($tran->created_at)->setTimezone(auth()->user()->time_zone)->toDayDateTimeString()
                            ]);
                    }
                    else
                    {
                        array_push($final_trans,[
                            'type'=>intVal($tran->trans_type),
                            'credits'=>$tran->credits, 
                            'payment_id'=>null,
                            'date_time'=>Carbon::parse($tran->created_at)->setTimezone(auth()->user()->time_zone)->toDayDateTimeString()
                            ]);
                    }
                }
                else if($tran->trans_type==7) // coupon applied
                {
                    array_push($final_trans,[
                        'type'=>intVal($tran->trans_type),
                        'credits'=>$tran->credits, 
                        'coupon'=>$tran->coupon,
                        'date_time'=>Carbon::parse($tran->created_at)->setTimezone(auth()->user()->time_zone)->toDayDateTimeString()
                        ]);
                }
            }

            if(count($next_page))
            {
                $page++;
            }
            else
            {
                $page=null;
            }

            $response = array(
                'status'=>'Success',
                'response'=>$final_trans,
                'page'=>$page
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

    public function top_up(Request $request)
    {
        $amount = 0;

        if (preg_match("/^[0-9,]+$/", $request['amount'])) {
            $amount = str_replace(',', '', $request['amount']);
        } else {
            $amount = $request['amount'];
        }

        if ($amount >= 100) {
            $api = new \Instamojo\Instamojo(
                config('services.instamojo.api_key'),
                config('services.instamojo.auth_token'),
                config('services.instamojo.url')
            );

            $user_id = auth()->user()->id;
            $name = auth()->user()->full_name;
            $email = auth()->user()->email;
            $dail_code = auth()->user()->dail_code;
            $phone_no = auth()->user()->phone_no;

            $phone = '+'.$dail_code.''.$phone_no;

            try {
                $response = $api->paymentRequestCreate(array(
                    "purpose" => "Wallet Top-up",
                    "amount" => $amount,
                    "user_id" => "$user_id",
                    "buyer_name" => "$name",
                    "send_email" => ($email != null) ? true : false,
                    "send_sms" => true,
                    "email" => ($email != null) ? "$email" : "",
                    "phone" => "$phone",
                    "allow_repeated_payments"=>false,
                    // "redirect_url" => "http://127.0.0.1:8000/pay-success"
                    "redirect_url" => url('/').'/'.auth()->user()->account_type . "/payment-status"
                ));

                header('Location: ' . $response['longurl']);
                exit();
            } catch (Exception $e) {
                // print('Error: ' . $e->getMessage());

                return redirect('/' . auth()->user()->account_type . '/my-wallet')->with('error', 'Something went wrong, please try again!');
            }
        } else {
            return redirect('/' . auth()->user()->account_type . '/my-wallet')->with('error', 'Amount should be atleast ₹100');
        }
    }

    public function payment_status(Request $request)
    {
        $payment_id = $request['payment_id'];
        $payment_status = $request['payment_status'];
        $payment_request_id = $request['payment_request_id'];

        if(InstaMojoTransaction::where('payment_id',$payment_id)->orWhere('payment_request_id',$payment_request_id)->count()==0)
        {
            \DB::beginTransaction();

            try {
                $api = new \Instamojo\Instamojo(
                    config('services.instamojo.api_key'),
                    config('services.instamojo.auth_token'),
                    config('services.instamojo.url')
                );
    
                $response = $api->paymentRequestStatus($payment_request_id);
                $amount = intVal($response['amount']);
    
                if($payment_status=='Credit')
                {
                   $wallet = Wallet::create([
                        'user_id'=>auth()->user()->id,
                        'trans_type'=>3, // top-up wallet
                        'credits'=>$amount
                    ]);
    
                    InstaMojoTransaction::create([
                        'wallet_id'=>$wallet->id,
                        'payment_request_id'=>$payment_request_id,
                        'payment_status'=>1, // credit
                        'payment_id'=>$payment_id
                    ]);
                }
                else if($payment_status=='Failed')
                {
                    $wallet = Wallet::create([
                        'user_id'=>auth()->user()->id,
                        'trans_type'=>3, // top-up wallet
                        'credits'=>$amount
                    ]);
    
                    InstaMojoTransaction::create([
                        'wallet_id'=>$wallet->id,
                        'payment_request_id'=>$payment_request_id,
                        'payment_status'=>2, // failed
                        'payment_id'=>$payment_id
                    ]);
                }
                else
                {
                    $wallet = Wallet::create([
                        'user_id'=>auth()->user()->id,
                        'trans_type'=>3, // top-up wallet
                        'credits'=>$amount
                    ]);
    
                    InstaMojoTransaction::create([
                        'wallet_id'=>$wallet->id,
                        'payment_request_id'=>$payment_request_id,
                        'payment_status'=>3, // unknown
                        'payment_id'=>$payment_id
                    ]);
                }
    
                \DB::commit();

                if($payment_status=='Credit')
                {
                    return redirect('/' . auth()->user()->account_type . '/my-wallet')->with('success', 'Successful Transaction!');
                }
                else if($payment_status=='Failed')
                {
                    return redirect('/' . auth()->user()->account_type . '/my-wallet')->with('error', 'Failed Transaction!');
                }
                else
                {
                    return redirect('/' . auth()->user()->account_type . '/my-wallet')->with('error', 'Something went wrong, please try again!');
                }
    
            } 
            catch (\Exception $e) {
                \DB::rollback();
    
                return redirect('/' . auth()->user()->account_type . '/my-wallet')->with('error', 'Something went wrong, please try again!');
            }
        }
        else
        {
            return redirect('/' . auth()->user()->account_type . '/my-wallet')->with('error', 'Invalid Url!');
        }
    }
    //  https://digivc.test/customer/pay-success?payment_id=MOJO0520U05A65833485&payment_status=Credit&payment_request_id=0513cc19386c4eeea753195e001b1a1f
}
