<?php

namespace App\Providers;

use App\Models\Setting;
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
        view()->composer('layouts.navbar', function($view){

           $setting = Setting::first();


            $view->with(compact('setting'));
        });

        view()->composer('layouts.main', function($view){

            $setting = Setting::first();


             $view->with(compact('setting'));
         });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
