<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardGalleryImage extends Model
{
    protected $fillable = [
        'card_id',
        'title',
        'image'
    ];
}
