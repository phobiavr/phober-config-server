<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (config('app.use_cache')) {
        $data = Cache::remember('configs_data', 300, function () {
            return DB::table('configs')->get()->pluck('value', 'key')->toArray();
        });
    } else {
        $data = DB::connection('db_configs')->table('configs')->get()->pluck('value', 'key')->toArray();
    }

    return response()->json($data);
});
