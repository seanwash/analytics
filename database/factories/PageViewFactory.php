<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PageViewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'host' => Str::of($this->faker->url())->beforeLast('/')->value(),
            'screen_size' => "{$this->faker->numberBetween(100, 2000)}x{$this->faker->numberBetween(100, 2000)}",
            'country_code' => $this->faker->countryCode(),
            'path' => '/'.Str::of($this->faker->url())->afterLast('/')->value(),
            'user_agent' => $this->faker->userAgent(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'website_id' => Website::factory(),
            'session_id' => $this->faker->uuid(),
        ];
    }
}
