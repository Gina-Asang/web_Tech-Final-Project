<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    protected $fillable = [
        'owner_user_id',
        'organisation_name',
        'logo',
        'description',
        'industry',
        'location',
        'contact_email',
        'contact_phone',
    ];
}