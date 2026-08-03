<?php

use App\Models\Config;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (config('app.use_cache')) {
        $data = Cache::remember('configs_data', 300, function () {
            return Config::query()->pluck('value', 'key')->toArray();
        });
    } else {
        $data = Config::query()->pluck('value', 'key')->toArray();
    }

    return response()->json($data);
});
