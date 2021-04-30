<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardVideo extends Model
{
    protected $fillable = [
        'card_id',
        'link'
    ];
}
