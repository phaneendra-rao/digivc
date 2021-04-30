<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardEnquiry extends Model
{
    protected $fillable = [
        'card_id',
        'name',
        'phone',
        'email',
        'message'
    ];
}
