<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'coupon',
        'coupon_type', // 1, 2
        'credits',
        'quantity',
        'user_phone',
        'valid_from',
        'valid_to',
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

// coupon types
// 1 Promotional
// 2 user specific