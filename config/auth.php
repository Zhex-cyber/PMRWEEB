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
        'anggota' => [
            'driver' => 'session',
            'provider' => 'anggotas', // Guard ini harus sesuai dengan provider yang ada di bawah
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'anggotas' => [ // Tambahkan provider ini untuk guard 'anggota'
            'driver' => 'eloquent',
            'model' => App\Models\Anggota::class, // Pastikan model Anggota sudah ada
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'anggotas' => [
            'provider' => 'anggotas', // Password reset untuk 'anggota'
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
