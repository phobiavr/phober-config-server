<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $configs = [
        'APP_NAME' => 'Phober',
        'APP_KEY' => 'base64:10GvWo3QVZLvODVr0rKxufpyI2rUVmLqbWv6dfEWs4U=',
        'APP_ENV' => 'local',
        'APP_DEBUG' => 'true',
        'APP_TIMEZONE' => 'UTC',

        'LOG_CHANNEL' => 'stack',
        'LOG_DEPRECATIONS_CHANNEL' => null,
        'LOG_LEVEL' => 'debug',

        'DB_MEDIA_CONNECTION' => 'mysql',
        'DB_MEDIA_HOST' => 'db',
        'DB_MEDIA_PORT' => '3306',
        'DB_MEDIA_DATABASE' => 'phober_media',
        'DB_MEDIA_USERNAME' => 'root',
        'DB_MEDIA_PASSWORD' => 'root',

        'DB_SHARED_CONNECTION' => 'mysql',
        'DB_SHARED_HOST' => 'db',
        'DB_SHARED_PORT' => '3306',
        'DB_SHARED_DATABASE' => 'phober_shared',
        'DB_SHARED_USERNAME' => 'root',
        'DB_SHARED_PASSWORD' => 'root',

        'BROADCAST_DRIVER' => 'log',
        'CACHE_DRIVER' => 'file',
        'FILESYSTEM_DISK' => 'local',
        'QUEUE_CONNECTION' => 'database',
        'SESSION_DRIVER' => 'file',
        'SESSION_LIFETIME' => '120',
        'MEMCACHED_HOST' => '127.0.0.1',

        'MAIL_MAILER' => 'smtp',
        'MAIL_HOST' => 'mailhog',
        'MAIL_PORT' => 1025,
        'MAIL_USERNAME' => null,
        'MAIL_PASSWORD' => null,
        'MAIL_ENCRYPTION' => null,
        'MAIL_FROM_ADDRESS' => 'hello@example.com',
        'MAIL_FROM_NAME' => '${APP_NAME}',
    ];

    $data = \DB::table('configs')->get()->pluck('value', 'key')->toArray();

    return response()->json(array_merge($configs, $data));
});
