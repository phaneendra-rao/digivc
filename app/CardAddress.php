<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardAddress extends Model
{
    protected $fillable = [
        'card_id',
        'branch_name',
        'company_address',
        'map_link'
    ];

}
