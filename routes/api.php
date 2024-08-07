<?php

use Illuminate\Http\Request;
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

        'AUTH_SERVER' => 'http://auth-server',

        'DB_AUTH_CONNECTION' => 'mysql',
        'DB_AUTH_HOST' => 'db',
        'DB_AUTH_PORT' => '3306',
        'DB_AUTH_DATABASE' => 'phober_auth',
        'DB_AUTH_USERNAME' => 'root',
        'DB_AUTH_PASSWORD' => 'root',

        'DB_DEVICE_CONNECTION' => 'mysql',
        'DB_DEVICE_HOST' => 'db',
        'DB_DEVICE_PORT' => '3306',
        'DB_DEVICE_DATABASE' => 'phober_device',
        'DB_DEVICE_USERNAME' => 'root',
        'DB_DEVICE_PASSWORD' => 'root',

        'DB_MEDIA_CONNECTION' => 'mysql',
        'DB_MEDIA_HOST' => 'db',
        'DB_MEDIA_PORT' => '3306',
        'DB_MEDIA_DATABASE' => 'phober_media',
        'DB_MEDIA_USERNAME' => 'root',
        'DB_MEDIA_PASSWORD' => 'root',

        'DB_NOTIFICATION_CONNECTION' => 'mysql',
        'DB_NOTIFICATION_HOST' => 'db',
        'DB_NOTIFICATION_PORT' => '3306',
        'DB_NOTIFICATION_DATABASE' => 'phober_notification',
        'DB_NOTIFICATION_USERNAME' => 'root',
        'DB_NOTIFICATION_PASSWORD' => 'root',

        'DB_LOG_CONNECTION' => 'mysql',
        'DB_LOG_HOST' => 'db',
        'DB_LOG_PORT' => '3306',
        'DB_LOG_DATABASE' => 'phober_log',
        'DB_LOG_USERNAME' => 'root',
        'DB_LOG_PASSWORD' => 'root',

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
