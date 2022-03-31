<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
  $values = [
    "DB_CONNECTION" => "mysql",
    "DB_HOST" => "localhost",
    "DB_PORT" => "3306",
    "DB_DATABASE" => "phober_device",
    "DB_USERNAME" => "root",
    "DB_PASSWORD" => "root",

    "DB_MEDIA_CONNECTION" => "mysql",
    "DB_MEDIA_HOST" => "localhost",
    "DB_MEDIA_PORT" => "3306",
    "DB_MEDIA_DATABASE" => "phober_media",
    "DB_MEDIA_USERNAME" => "root",
    "DB_MEDIA_PASSWORD" => "root",

    "AUTH_SERVER" => "http://localhost:8500/",

    "AWS_ACCESS_KEY_ID" => "",
    "AWS_SECRET_ACCESS_KEY" => "",
    "AWS_DEFAULT_REGION" => "us-east-1",
    "AWS_BUCKET" => "",
    "AWS_USE_PATH_STYLE_ENDPOINT" => "false"
  ];

  return response()->json($values);
});
