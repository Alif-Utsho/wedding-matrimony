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
        $navServices = Service::whereStatus(true)->limit(4)->get();
        view()->share('navServices', $navServices);

        $ourteams = Ourteam::whereStatus(true)->get();
        view()->share('ourteams', $ourteams);

        $cities  = City::whereStatus(true)->orderBy('name', 'ASC')->get();
        view()->share('cities', $cities);

        $contactinfo = Contactinfo::whereStatus(true)->first();
        view()->share('contactinfo', $contactinfo);

        $generalsetting = GeneralSetting::whereStatus(true)->first();
        view()->share('generalsetting', $generalsetting);
    }
}
