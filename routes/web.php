<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
  $values = [
    'AUTH_SERVER' => 'http://auth-server',

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

    'AWS_ACCESS_KEY_ID' => env('AWS_ACCESS_KEY_ID'),
    'AWS_SECRET_ACCESS_KEY' => env('AWS_SECRET_ACCESS_KEY'),
    'AWS_DEFAULT_REGION' => env('AWS_DEFAULT_REGION'),
    'AWS_BUCKET' => env('AWS_BUCKET'),
    'AWS_USE_PATH_STYLE_ENDPOINT' => env('AWS_USE_PATH_STYLE_ENDPOINT') ? 'true' : 'false',

    'BROADCAST_DRIVER' => 'log',
    'CACHE_DRIVER' => 'file',
    'FILESYSTEM_DISK' => 'local',
    'QUEUE_CONNECTION' => 'sync',
    'SESSION_DRIVER' => 'file',
    'SESSION_LIFETIME' => '120',

    'MEMCACHED_HOST' => '127.0.0.1',

    'REDIS_HOST' => '127.0.0.1',
    'REDIS_PASSWORD' => null,
    'REDIS_PORT' => 6379,

    'MAIL_MAILER' => 'smtp',
    'MAIL_HOST' => 'mailhog',
    'MAIL_PORT' => 1025,
    'MAIL_USERNAME' => null,
    'MAIL_PASSWORD' => null,
    'MAIL_ENCRYPTION' => null,
    'MAIL_FROM_ADDRESS' => 'hello@example.com',
    'MAIL_FROM_NAME' => '${APP_NAME}',

    'PUSHER_APP_ID' => '',
    'PUSHER_APP_KEY' => '',
    'PUSHER_APP_SECRET' => '',
    'PUSHER_APP_CLUSTER' => 'mt1',

    'MIX_PUSHER_APP_KEY' => '${PUSHER_APP_KEY}',
    'MIX_PUSHER_APP_CLUSTER' => '${PUSHER_APP_CLUSTER}'
  ];

  return response()->json($values);
});
