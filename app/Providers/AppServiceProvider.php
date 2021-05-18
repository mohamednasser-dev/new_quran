<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Africa/Cairo');
        $charts->register([
            \App\Charts\SalonChart::class
        ]);
        Paginator::viewFactory();
    }
}
