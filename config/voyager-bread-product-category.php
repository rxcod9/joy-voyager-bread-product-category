<?php

return [

    /*
     * If enabled for voyager-bread-product-category package.
     */
    'enabled' => env('VOYAGER_BREAD_PRODUCT_CATEGORY_ENABLED', true),

    /*
     * The config_key for voyager-bread-product-category package.
     */
    'config_key' => env('VOYAGER_BREAD_PRODUCT_CATEGORY_CONFIG_KEY', 'joy-voyager-bread-product-category'),

    /*
     * The route_prefix for voyager-bread-product-category package.
     */
    'route_prefix' => env('VOYAGER_BREAD_PRODUCT_CATEGORY_ROUTE_PREFIX', 'joy-voyager-bread-product-category'),

    /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify voyager controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Joy\\VoyagerBreadProductCategory\\Http\\Controllers',
    ],
];
