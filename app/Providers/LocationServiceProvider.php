<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Models\Location;
use Illuminate\Support\Facades\View;
class LocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('locations',request()->input());
        });
    }
}
