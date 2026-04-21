<?php

namespace App\Models;

use App\PortfolioCategory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'portfolio_title',
        'portfolio_description',
        'portfolio_image',
        'portfolio_category'
    ];

    protected $casts = [
        'portfolio_category' => PortfolioCategory::class,
    ];
}
