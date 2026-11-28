<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualProfile extends Model
{
    protected $fillable = [
        'user_id',
        'profile_photo',
        'location',
        'headline',
        'about',
        'interest_mode',
    ];
}