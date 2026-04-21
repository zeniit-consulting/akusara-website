<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'company_profile_title',
        'company_profile_description',
        'company_profile_vision',
        'company_profile_mission',
        'company_profile_values',
    ];
}
