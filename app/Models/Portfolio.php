<?php

namespace App\Models;

use App\PortfolioCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'portfolio_title',
        'portfolio_description',
        'portfolio_image',
        'portfolio_category',
        'slug',
    ];

    protected $casts = [
        'portfolio_category' => PortfolioCategory::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($portfolio) {
            $slug = Str::slug($portfolio->portfolio_title);
            $count = static::where('slug', 'LIKE', "$slug%")->count();
            $portfolio->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
}
