<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlinePayment extends Model
{
    protected $fillable = [
        'card_id',
        'payment_type',
        'number',
        'link'
    ];
}
