<?php

namespace App\Providers;

use App\Models\About;
use App\Models\CompanyProfile;
use App\Models\FeaturedServices;
use App\Models\Hero;
use App\Models\Portfolio;
use App\Models\Settings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Settings::first();
        $hero = Hero::first();
        $about = About::first();
        $companyProfile = CompanyProfile::first();
        
       
        View::share('setting', $setting);
        View::share('hero', $hero);
        View::share('about', $about);
        View::share('companyProfile', $companyProfile);
        View::share('featuredServices', FeaturedServices::latest()->get());
        View::share('portfolios', Portfolio::latest()->get());

    }
}
