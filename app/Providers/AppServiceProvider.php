<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Str::macro('currency', function ($price)
        {
            return number_format($price, 0, ',', '.');
        });

        config(['app.locale' => 'id']);
	      Carbon::setLocale('id');
    }
}
