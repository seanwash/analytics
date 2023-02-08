<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WebsiteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'domain' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
