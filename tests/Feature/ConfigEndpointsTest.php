<?php

namespace Tests\Feature;

use App\Models\Config;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ConfigEndpointsTest extends TestCase
{
    public function test_returns_all_configs_keyed_by_their_key(): void
    {
        Config::factory()->create(['key' => 'FEATURE_NEW_MODE', 'value' => 'false']);
        Config::factory()->create(['key' => 'FEATURE_X', 'value' => 'true']);

        $this->getJson('/')
            ->assertOk()
            ->assertJson(['FEATURE_NEW_MODE' => 'false', 'FEATURE_X' => 'true']);
    }

    public function test_returns_an_empty_object_when_there_are_no_configs(): void
    {
        Config::query()->delete();

        $this->getJson('/')->assertOk()->assertExactJson([]);
    }

    public function test_serves_cached_data_on_subsequent_requests_when_caching_is_enabled(): void
    {
        config(['app.use_cache' => true]);
        Config::factory()->create(['key' => 'CACHED_KEY', 'value' => 'original']);

        $this->getJson('/')->assertJson(['CACHED_KEY' => 'original']);

        Config::query()->update(['value' => 'changed']);

        // Still serves the value cached from the first request.
        $this->getJson('/')->assertJson(['CACHED_KEY' => 'original']);

        Cache::forget('configs_data');
    }

    public function test_reflects_fresh_data_on_every_request_when_caching_is_disabled(): void
    {
        config(['app.use_cache' => false]);
        $config = Config::factory()->create(['key' => 'LIVE_KEY', 'value' => 'original']);

        $this->getJson('/')->assertJson(['LIVE_KEY' => 'original']);

        $config->update(['value' => 'changed']);

        $this->getJson('/')->assertJson(['LIVE_KEY' => 'changed']);
    }

    public function test_exposes_the_framework_health_and_instance_info_routes(): void
    {
        $this->getJson('/health')->assertOk()->assertJson(['status' => 'OK']);
        $this->getJson('/instance-info')->assertOk()->assertJsonStructure(['instance_id']);
    }

    public function test_runs_the_config_client_update_command_in_dry_run_mode_behind_the_private_secret(): void
    {
        Http::fake(['http://config-server' => Http::response(['FOO' => 'bar'])]);

        $this->withHeaders(['X-Service-Secret' => config('service.secret')])
            ->getJson('/config-client/update?dry-run=true')
            ->assertOk()
            ->assertJsonPath('options.dry_run', true)
            ->assertJsonPath('message', 'Config update command executed.');
    }

    public function test_rejects_the_config_client_update_route_without_the_service_secret(): void
    {
        $this->getJson('/config-client/update?dry-run=true')->assertStatus(401);
    }
}
