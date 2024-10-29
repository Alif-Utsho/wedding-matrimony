<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\Ourteam;
use App\Models\Contactinfo;
use App\Models\City;
use App\Models\GeneralSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


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
        if (Schema::hasTable('services')) {
            $navServices = Service::where('status', 1)->limit(4)->get();
            view()->share('navServices', $navServices);
        }

        if (Schema::hasTable('ourteams')) {
            $ourteams = Ourteam::where('status', 1)->get();
            view()->share('ourteams', $ourteams);
        }

        if (Schema::hasTable('cities')) {
            $cities = City::where('status', 1)->orderBy('name', 'ASC')->get();
            view()->share('cities', $cities);
        }

        if (Schema::hasTable('contactinfos')) {
            $contactinfo = Contactinfo::where('status', 1)->first();
            view()->share('contactinfo', $contactinfo);
        }

        if (Schema::hasTable('general_settings')) {
            $generalsetting = GeneralSetting::where('status', 1)->first();
            view()->share('generalsetting', $generalsetting);
        }
    }
}
