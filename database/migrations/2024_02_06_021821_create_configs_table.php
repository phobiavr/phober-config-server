<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('value')->nullable();
            $table->timestamps();
        });

        $configs = [
            'APP_NAME'     => 'Phober',
            'APP_ENV'      => 'local',
            'APP_DEBUG'    => 'true',

            'TELESCOPE_ENABLED' => 'true',

            'LOG_CHANNEL'              => 'stack',
            'LOG_DEPRECATIONS_CHANNEL' => null,
            'LOG_LEVEL'                => 'debug',

            'DB_SHARED_CONNECTION' => 'mysql',
            'DB_SHARED_HOST'       => 'db_mysql',
            'DB_SHARED_PORT'       => '3306',
            'DB_SHARED_DATABASE'   => 'phober_shared',
            'DB_SHARED_USERNAME'   => 'root',
            'DB_SHARED_PASSWORD'   => 'root',

            'BROADCAST_DRIVER' => 'log',
            'CACHE_DRIVER'     => 'file',
            'FILESYSTEM_DISK'  => 'local',
            'QUEUE_CONNECTION' => 'database',
            'SESSION_DRIVER'   => 'file',
            'SESSION_LIFETIME' => '120',
            'MEMCACHED_HOST'   => '127.0.0.1',

            'MAIL_MAILER'       => 'smtp',
            'MAIL_HOST'         => 'mailhog',
            'MAIL_PORT'         => 1025,
            'MAIL_USERNAME'     => null,
            'MAIL_PASSWORD'     => null,
            'MAIL_ENCRYPTION'   => null,
            'MAIL_FROM_ADDRESS' => 'hello@example.com',
            'MAIL_FROM_NAME'    => '${APP_NAME}',
        ];

        foreach ($configs as $key => $value) {
            DB::table('configs')->insert(['key' => $key, 'value' => $value]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('configs');
    }
};
