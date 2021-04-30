<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Card extends Model
{
    use Sluggable;
    use SoftDeletes;

    protected $fillable = [
        'custom_slug',
        'user_id',
        'card_type',
        'logo_shape',
        'sms',
        'template',
        'company_name',
        'tag_line',
        'company_logo',
        'primary_color',
        'company_cover',
        'company_phone',
        'company_whatsapp_no',
        'company_email',
        'company_website',
        'company_about',
        'company_offer',
        'contact_profile_pic',
        'contact_person_name',
        'contact_person_designation',
        'contact_person_phone',
        'contact_person_whatsapp_no',
        'expiry_on',
        'status',
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'company_name',
                'onUpdate'=>true,
                'unique'=>true,
            ]
        ];
    }
}
