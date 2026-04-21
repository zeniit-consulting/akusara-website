<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'about_title',
        'about_description',
        'about_image',
    ];
}
