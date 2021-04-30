<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardDc extends Model
{
    protected $fillable = [
        'card_id',
        'type',
        'title',
        'dc_name'
    ];
}
