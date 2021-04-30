<?php return [

    /*
    |--------------------------------------------------------------------------
    | LaravelTester Path
    |--------------------------------------------------------------------------
    |
    | URI path where LaravelTester will be served. Feel free to change it.
    |
    */

    'path' => env('LARAVELTESTER_PATH', 'laraveltester'),

    /*
    |--------------------------------------------------------------------------
    | LaravelTester middlewares
    |--------------------------------------------------------------------------
    |
    | Array of middlewares for LaravelTester path. You can add auth as an example.
    | Default is ['web'].
    |
    */

    'middlewares' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Name of web middleware
    |--------------------------------------------------------------------------
    |
    | This is the name of the middleware for web routes. This name will be used 
    | to list web routes. Default is 'web'.  
    |
    */

    'web_middleware_name' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Name of api middleware
    |--------------------------------------------------------------------------
    |
    | This is the name of the middleware for api routes. This name will be used 
    | to list api routes. Default is 'api'.  
    |
    */

    'api_middleware_name' => 'api',

    /*
    |--------------------------------------------------------------------------
    | LaravelTester headers
    |--------------------------------------------------------------------------
    |
    | Add list of headers that you need LaravelTester include in request here.
    | default: for all routes
    | api    : for api routes
    | web    : for web routes 
    | 
    */

    'headers' => [
        'default' => [
            "Authorization" => 'Bearer testertoken'
        ],
        'api' => [
            "Accept" => "application/json",
            "content-type" => "application/json",
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | LaravelTester editor 
    |--------------------------------------------------------------------------
    |
    | Name of your current code editor. This will be used to open files from
    | LaravelTester panel. Currently supporting [vcode].
    | 
    */

    'editor' => env('LARAVELTESTER_EDITOR', 'vcode')
];
