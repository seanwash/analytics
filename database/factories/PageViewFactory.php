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
            'sid' => $this->faker->uuid(),
            'host' => $this->faker->domainName(),
            'screen_size' => "{$this->faker->numberBetween(100, 2000)}x{$this->faker->numberBetween(100, 2000)}",
            'country_code' => $this->faker->countryCode(),
            'path' => '/'.Str::of($this->faker->url())->afterLast('/'),
            'user_agent' => $this->faker->userAgent(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'website_id' => Website::factory(),
        ];
    }
}
