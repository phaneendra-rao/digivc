<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreSmsNumber extends Model
{
    protected $fillable = [
        'card_id',
        'name',
        'number',
        'note'
    ];
}
