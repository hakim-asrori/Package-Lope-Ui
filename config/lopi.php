<?php

return [

    'title' => env('APP_NAME', 'Lopi'),

    'path' => env('DASHBOARD_PATH', 'lopi'),

    'auth' => [
        'guard' => 'web',
        'middlewares' => [
            'web',
            // 'auth'
        ]
    ],

    'resources' => [
        'path' => app_path('Lopi/Resources'),
        'namespace' => 'App\\Lopi\\Resources'
    ],

    'ui' => [
        'sidebar_collapsible' => true,
        'dark_mode' => true,
        'primary_color' => '#0f172a'
    ],

];
