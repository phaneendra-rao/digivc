<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_pic',
        'full_name',
        'email',
        'phone_no',
        'gender',
        'dob',
        'dail_code',
        'country_code',
        'country_name',
        'time_zone',
        'account_status',
        'account_type', // master, channel_partner, customer
        'referral_code',
        'referred_by',
        'sms_credits',
        'password',
        'verification_code',
        'verification_code_date_time',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'verification_code',
        'verification_code_date_time',
        'deleted_at'
    ];
}
