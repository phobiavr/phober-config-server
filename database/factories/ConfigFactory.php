<?php

namespace Database\Factories;

use App\Models\Config;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Config>
 */
class ConfigFactory extends Factory
{
    protected $model = Config::class;

    public function definition(): array
    {
        return [
            'key' => 'TEST_'.strtoupper($this->faker->unique()->word()),
            'value' => $this->faker->word(),
        ];
    }
}
