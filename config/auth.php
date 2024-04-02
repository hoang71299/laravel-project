<?php

return [



    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],


    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'dai_ly' => [
            'driver'    => 'session',
            'provider'  => 'dai_ly',
        ],
        'nhan_vien' => [
            'driver'    => 'session',
            'provider'  => 'nhan_vien',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'dai_ly' => [
            'driver' => 'eloquent',
            'model'  => App\Models\DaiLy::class,
        ],
        'nhan_vien' => [
            'driver' => 'eloquent',
            'model'  => App\Models\NhanVien::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],


    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
