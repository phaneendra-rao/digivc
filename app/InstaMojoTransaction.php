<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InstaMojoTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'wallet_id',
        'payment_request_id',
        'payment_status',
        'payment_id'
    ];

    // payment status
    // 1 - success
    // 2 - failed
    // 3 - unknown

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];
}
