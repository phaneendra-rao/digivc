<?php

namespace App\Http\Controllers\Customer;

use App\Card;
use App\Wallet;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\User;
use Carbon\Carbon;

class CustomerRoutesController extends Controller
{
    public function __construct()
    {
        \Session::put('url.intended',\Request::fullUrl());
    }

    public function dashboard()
    {
        $my_credits = get_customer_wallet_balance(auth()->user()->id);
        $basic_cards = Card::where('user_id',auth()->user()->id)->where('card_type','basic')->count();
        $premium_cards = Card::where('user_id',auth()->user()->id)->where('card_type','premium')->count();

        return view('users.customer.dashboard', compact('my_credits','basic_cards','premium_cards'));
    }

    public function account()
    {
    //    $created_at = Carbon::parse(auth()->user()->created_at)->setTimezone(auth()->user()->time_zone)->format('d-m-Y H:i:s');;

        return view('users.customer.account');
    }

    public function my_cards()
    {
        $cards = Card::where('user_id',auth()->user()->id)->get();
        $my_credits = get_customer_wallet_balance(auth()->user()->id);
        return view('users.customer.my-cards',compact('cards','my_credits'));
    }

    public function my_wallet()
    {
        $my_credits = get_customer_wallet_balance(auth()->user()->id);

        return view('users.customer.my-wallet',compact('my_credits'));
    }

    public function shop()
    {
        $my_credits = get_customer_wallet_balance(auth()->user()->id);
        return view('users.customer.shop', compact('my_credits'));
    }
}
