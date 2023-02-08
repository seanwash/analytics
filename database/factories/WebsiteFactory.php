<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WebsiteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'domain' => $this->faker->domainName(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
