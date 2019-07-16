<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Sentinel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

       view()->composer('*', function ($view) {

        if (Auth()->user()) {
            $view->with('user', Auth()->user());
        } else {
            $view->with('user', null);
        }

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
