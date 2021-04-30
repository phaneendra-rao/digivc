<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardService extends Model
{
    protected $fillable = [
        'card_id',
        'service'
    ];
}
