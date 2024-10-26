<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\Ourteam;
use App\Models\Contactinfo;
use App\Models\City;
use App\Models\GeneralSetting;
use Illuminate\Support\ServiceProvider;

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
    }
}
