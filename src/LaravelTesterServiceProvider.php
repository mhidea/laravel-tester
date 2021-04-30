<?php

namespace Mhidea\laraveltester;

use Illuminate\Support\ServiceProvider;

/**
 * undocumented class
 */
class LaravelTesterServiceProvider  extends ServiceProvider
{
    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/laravel-tester.php',
            'laravel-tester'
        );

        return true;
    }
    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'laraveltester');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->publishes([
            __DIR__ . '/config/laravel-tester.php' => config_path('laravel-tester.php')
        ], 'laraveltester');
    }
}
