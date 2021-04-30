<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardShareableLink extends Model
{
    protected $fillable = [
        'card_id',
        'name',
        'link'
    ];
}
