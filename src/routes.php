<?php

Route::prefix(config('laravel-tester.path'))->name("laraveltester.")
    ->middleware(config('laravel-tester.middlewares'))
    ->namespace('Mhidea\laraveltester\controller')->group(function () {
        Route::get('/', "LaravelTesterController@index")->name("index");
        Route::get('/request', "LaravelTesterController@request")->name("request");
    });
