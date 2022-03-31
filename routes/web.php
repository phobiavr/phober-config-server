<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
  $values = [
    "DB_CONNECTION" => "mysql",
    "DB_HOST" => "host.docker.internal",
    "DB_PORT" => "3306",
    "DB_DATABASE" => "phober_device",
    "DB_USERNAME" => "root",
    "DB_PASSWORD" => "root",

    "DB_MEDIA_CONNECTION" => "mysql",
    "DB_MEDIA_HOST" => "host.docker.internal",
    "DB_MEDIA_PORT" => "3306",
    "DB_MEDIA_DATABASE" => "phober_media",
    "DB_MEDIA_USERNAME" => "root",
    "DB_MEDIA_PASSWORD" => "root",

    "AUTH_SERVER" => "http://host.docker.internal:8500/",

    "AWS_ACCESS_KEY_ID" => env("AWS_ACCESS_KEY_ID"),
    "AWS_SECRET_ACCESS_KEY" => env("AWS_SECRET_ACCESS_KEY"),
    "AWS_DEFAULT_REGION" => env("AWS_DEFAULT_REGION"),
    "AWS_BUCKET" => env("AWS_BUCKET"),
    "AWS_USE_PATH_STYLE_ENDPOINT" => env("AWS_USE_PATH_STYLE_ENDPOINT") ? 'true' : 'false'
  ];

  return response()->json($values);
});
