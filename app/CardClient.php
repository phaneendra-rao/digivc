<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardClient extends Model
{
    protected $fillable = [
        'card_id',
        'client_name'
    ];

}
