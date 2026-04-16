<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'company_name',
        'email',
        'phone',
        'address',
        'logo',
        'hero_title',
        'hero_description',
        'hero_image',
        'about_title',
        'about_description',
        'about_image',
        'services_title',
        'services_description',
        'company_profile_title',
        'company_profile_description',
        'company_profile_vision',
        'company_profile_mission',
        'company_profile_values',
        'tiktok',
        'instagram',
        'linkedin',
    ];
    
}
