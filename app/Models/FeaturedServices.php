<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedServices extends Model
{
    protected $fillable = [
        'featured_services_title',
        'featured_services_description',
    ];
}
