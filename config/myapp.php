<?php

return [

    'mail_drivers'=> [
        'mail'    => 'Mail',
        'mailgun' => 'Mail Gun',
        'smtp'    => 'SMTP'
    ],

    'admin_prefix'=>'admin',

    'public_prefix'=>'account',

    'courses' => [
        'per_page' => 10,
    ],

    'events' => [
        'per_page' => 20,
    ],

    'testimonials' => [
        'per_page' => 20,
    ],

    'sermons' => [
        'per_page' => 20,
    ],

    'partners' => [
        'per_page' => 20,
    ],

    'products' => [
        'per_page' => 20,
    ],


    'linkable_to_page' => ['','','',''],

    'middleware' => [
        'backend' => [
            'auth.admin',
            'permissions',
        ],
        'account' => [
            'auth.account',
            /*'web'*/
        ],
        'api' => [
        ],
    ],

    'paypal' => [
        'mode' => 'sandbox',
        'endpoint' => 'https://api.sandbox.paypal.com',
        'connection' => 30,
        'log_enabled' => true,
        'log_storage_path' => storage_path('logs/paypal.log'),
        'log_level' => 'FINE'
    ],
];
