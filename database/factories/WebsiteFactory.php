<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class WebsiteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'domain' => Str::of($this->faker->url())->beforeLast('/')->value(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
