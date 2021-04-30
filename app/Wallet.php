<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'trans_type',
        'coupon',
        'credits'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];
}

// Trans Types
// 1 - Signup amount
// 2 - Referral amount
// 3 - Top-up Wallet
// 4 - Card Purchased
// 5 - SMS Purchased
// 6 - Renewed Card
// 7 - Coupon applied
// 8 - First New card cashback
// 9 - Card Upgrade
