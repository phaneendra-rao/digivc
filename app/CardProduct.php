<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardProduct extends Model
{
    protected $fillable = [
        'card_id',
        'name',
        'image',
        'description',
        'price',
        'payment_link',
    ];
}
