<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Auth\SessionGuard;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        SessionGuard::macro('role', function (...$values) {
            return \Auth::user()->role(...$values);
        });
        SessionGuard::macro('roleOr', function (...$values) {
            return \Auth::user()->roleOr(...$values);
        });
        Blade::if('role', function (...$roles) {
            return auth()->role(...$roles);
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
