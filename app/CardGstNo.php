<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardGstNo extends Model
{
    protected $fillable = [
        'card_id',
        'company_name',
        'gst_no'
    ];
}
