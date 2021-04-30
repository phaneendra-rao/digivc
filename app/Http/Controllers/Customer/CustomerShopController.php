<?php

namespace App\Http\Controllers\Customer;

use App\Card;
use App\Http\Controllers\Controller;
use App\InstaMojoTransaction;
use Illuminate\Http\Request;

use App\User;
use App\Wallet;
use Carbon\Carbon;

class CustomerShopController extends Controller
{
    protected function referral_code()
    {
        $referral_code = preString(6);

        if(User::where('referral_code',$referral_code)->count())
        {
            $this->referral_code();
        }
        else
        {
            return $referral_code;
        }
    }

    public function shop_product(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'product' => 'required',
            'package' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } 
        else {
            
            $products = array('basic_card','premium_card','sms');
            $packages = array(1,2,3);

            if(!in_array($request['product'],$products))
            {
                return response()->json(['errors' => ['product'=>['Invalid Product!']]]);
            }

            if(!in_array($request['package'],$packages))
            {
                return response()->json(['errors' => ['package'=>['Invalid Product!']]]);
            }

            if($request['product']=='basic_card')
            {
                $credits = env('BASIC_CARD_'.$request['package'].'_YEAR');

                if($credits>get_customer_wallet_balance(auth()->user()->id))
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Insufficient balance!'
                    );                    
                }
                else
                {

                    \DB::beginTransaction();

                    try 
                    {
                        $flag = 0;

                        Wallet::create([
                            'user_id'=>auth()->user()->id,
                            'trans_type'=>4, // Card purchased
                            'credits'=>$credits
                        ]);

                        $expiry_on = date('Y-m-d', strtotime('+'.$request['package'].' year'));

                        Card::create([
                            'user_id'=>auth()->user()->id,
                            'card_type'=>'basic',
                            'expiry_on'=>$expiry_on
                        ]);

                        if(Card::where('user_id',auth()->user()->id)->count()==1)
                        {
                            User::where('id',auth()->user()->id)->update([
                                'referral_code'=>$this->referral_code()
                            ]);                            

                            $referral_credits = ($credits/100)*10;

                            if(auth()->user()->referred_by!='direct')
                            {
                                $get_user = User::select('id')->where('referral_code',auth()->user()->referred_by)->get();

                                if(count($get_user)==1)
                                {
                                    Wallet::create([
                                        'user_id'=>$get_user[0]->id,
                                        'trans_type'=>2, // referral amount
                                        'credits'=>$referral_credits
                                    ]);
                                }
                            }

                            Wallet::create([
                                'user_id'=>auth()->user()->id,
                                'trans_type'=>8, // first new card cash back
                                'credits'=>$referral_credits
                            ]);

                            $flag = 1;
                        }
                        
                        \DB::commit();

                        // SEND CREDIT TRANSACTION STATUS
                        // SEND NEW CARD PURCHASED SMS

                        if($flag)
                        {
                            // SEND REFERRAL LINK AS SMS TO CUSTOMER
                            // SEND REFERRAL CREDITS SMS TO REFERRED USER
                            // SEND CASHBACK CREDITS SMS TO PURCHASED CUSTOMER
                        }

                        $response = array(
                            'status'=>'Success',
                            'response'=>'Successfully Purchased Basic Card!'
                        );

                    } catch (\Exception $e) {
                        
                        \DB::rollback();

                        $response = array(
                            'status'=>'Error',
                            'response'=>'Please try again!',
                            'e'=>$e
                        );
                    }
                }
            }
            else if($request['product']=='premium_card')
            {
                $credits = env('PREMIUM_CARD_'.$request['package'].'_YEAR');

                if($credits>get_customer_wallet_balance(auth()->user()->id))
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Insufficient balance!'
                    );                    
                }
                else
                {
                    \DB::beginTransaction();

                    try 
                    {
                        $flag = 0;

                        Wallet::create([
                            'user_id'=>auth()->user()->id,
                            'trans_type'=>4, // Card purchased
                            'credits'=>$credits
                        ]);

                        $expiry_on = date('Y-m-d', strtotime('+'.$request['package'].' year'));

                        Card::create([
                            'user_id'=>auth()->user()->id,
                            'card_type'=>'premium',
                            'expiry_on'=>$expiry_on
                        ]);

                        if(Card::where('user_id',auth()->user()->id)->count()==1)
                        {
                            User::where('id',auth()->user()->id)->update([
                                'referral_code'=>$this->referral_code()
                            ]);                            

                            $referral_credits = ($credits/100)*10;

                            if(auth()->user()->referred_by!='direct')
                            {
                                $get_user = User::select('id')->where('referral_code',auth()->user()->referred_by)->get();

                                if(count($get_user)==1)
                                {
                                    Wallet::create([
                                        'user_id'=>$get_user[0]->id,
                                        'trans_type'=>2, // referral amount
                                        'credits'=>$referral_credits
                                    ]);
                                }
                            }

                            Wallet::create([
                                'user_id'=>auth()->user()->id,
                                'trans_type'=>8, // first new card cash back
                                'credits'=>$referral_credits
                            ]);

                            $flag = 1;
                        }
                        
                        \DB::commit();

                        // SEND CREDIT TRANSACTION STATUS
                        // SEND NEW CARD PURCHASED SMS

                        if($flag)
                        {
                            // SEND REFERRAL LINK AS SMS TO CUSTOMER
                            // SEND REFERRAL CREDITS SMS TO REFERRED USER
                            // SEND CASHBACK CREDITS SMS TO PURCHASED CUSTOMER
                        }

                        $response = array(
                            'status'=>'Success',
                            'response'=>'Successfully purchased Premium Card!'
                        );

                    } catch (\Exception $e) {
                        \DB::rollback();

                        $response = array(
                            'status'=>'Error',
                            'response'=>'Please try again!'
                        );
                    }
                }
            }
            else if($request['product']=='sms')
            {
                $sms_credits = env('SMS_PACKAGE_'.$request['package'].'_SMS');
                $sms_price = env('SMS_PACKAGE_'.$request['package'].'_PRICE');

                if($sms_price>get_customer_wallet_balance(auth()->user()->id))
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Insufficient balance!'
                    );
                }
                else
                {
                    \DB::beginTransaction();

                    try {
                        
                        Wallet::create([
                            'user_id'=>auth()->user()->id,
                            'trans_type'=>5, // SMS purchased
                            'credits'=>$sms_price
                        ]);

                        User::where('id',auth()->user()->id)->increment('sms_credits',$sms_credits);
    
                        \DB::commit();

                        // SEND CREDIT TRANSACTION STATUS
                        // SEND SMS CREDITS BALANCE
    
                        $response = array(
                            'status'=>'Success',
                            'response'=>'Successfully purchased '.number_format($sms_credits).' SMS credits!'
                        );
    
                    } catch (\Exception $e) {
                        \DB::rollback();
    
                        $response = array(
                            'status'=>'Error',
                            'response'=>'Please try again!'
                        );
                    }
                }
            }
            else
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Invalid Operation!'
                );
            }

            return response()->json($response);
        }
    }

    public function upgrade_product(Request $request)
    {
        if(Card::where('id',$request['card_id'])->where('user_id',auth()->user()->id)->count())
        {
            $basic_credits = env('BASIC_CARD_1_YEAR');
            $premium_credits = env('PREMIUM_CARD_1_YEAR');

            if(get_customer_wallet_balance(auth()->user()->id)>=($premium_credits-$basic_credits))
            {
                \DB::beginTransaction();

                try {
                    
                    Card::where('id',$request['card_id'])->update([
                        'card_type'=>'premium'
                    ]);

                    Wallet::create([
                        'user_id'=>auth()->user()->id,
                        'trans_type'=>9, // Upgrade Card
                        'credits'=>($premium_credits-$basic_credits)
                    ]);

                    \DB::commit();

                    $response = array(
                        'status'=>'Success',
                        'response'=>'Card successfully upgraded!'
                    );
                } catch (\Exception $e) 
                {
                    \DB::rollback();

                    $response = array(
                        'status'=>'Error',
                        'response'=>'Please try again!'
                    );
                }
            }
            else
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Insufficient Balance!'
                );                
            }
        }   
        else
        {
            $response = array(
                'status'=>'Error',
                'response'=>'No records found!'
            );
        }         

        return response()->json($response);
    }

    public function downgrade_card(Request $request)
    {
        if(Card::where('id',$request['id'])->where('user_id',auth()->user()->id)->count())
        {
            \DB::beginTransaction();

            try {
                Card::where('id',$request['id'])->update([
                    'card_type'=>'basic'
                ]);

                \DB::commit();

                $response = array(
                    'status'=>'Success',
                    'response'=>'Card successfully downgraded!'
                );
            } catch (\Exception $e) 
            {
                \DB::rollback();

                $response = array(
                    'status'=>'Error',
                    'response'=>'Please try again!'
                );
            }
        }   
        else
        {
            $response = array(
                'status'=>'Error',
                'response'=>'No records found!'
            );
        }         

        return response()->json($response);
    }

    public function renew_product(Request $request)
    {
        $card_id = $request['card_id'];
        $card_type = $request['card_type'];

        $renew_package = $request['renew_package'];

        $card = Card::where('id',$card_id)->where('card_type',$card_type)->where('user_id',auth()->user()->id)->get();

        if(count($card)==1)
        {
            if($card_type=='basic')
            {
                $credits = env('BASIC_CARD_'.$request['renew_package'].'_YEAR');
            }
            else
            {
                $credits = env('PREMIUM_CARD_'.$request['renew_package'].'_YEAR');
            }

            if(get_customer_wallet_balance(auth()->user()->id)>=$credits)
            {
                $card_date = $card[0]->expiry_on;
            
                if($card_date>date('Y-m-d'))
                {
                    $expiry_on = date('Y-m-d', strtotime(date('Y-m-d',strtotime($card_date)).' +'.$request['renew_package'].' year'));
                }
                else
                {
                    $expiry_on = date('Y-m-d', strtotime('+'.$request['renew_package'].' year'));
                }

                
                \DB::beginTransaction();

                try {
                    Card::where('id',$request['card_id'])->where('user_id',auth()->user()->id)->update([
                        'expiry_on'=>$expiry_on
                    ]);
    
                    Wallet::create([
                        'user_id'=>auth()->user()->id,
                        'trans_type'=>6, // Renew Card
                        'credits'=>$credits
                    ]);
    
                    \DB::commit();
    
                    $response = array(
                        'status'=>'Success',
                        'response'=>'Card successfully renewed!'
                    );
                } catch (\Exception $e) {
                    \DB::rollback();
    
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Please try again!'
                    );
                }
            }
            else
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Insufficient Balance!'
                );
            }
        }   
        else
        {
            $response = array(
                'status'=>'Error',
                'response'=>'No records found!'
            );
        }         

        return response()->json($response);
    }
}
