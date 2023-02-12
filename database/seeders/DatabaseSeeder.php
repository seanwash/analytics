<?php

namespace Database\Seeders;

use App\Models\PageView;
use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Sean Washington',
            'email' => 'hello@seanwash.com',
        ]);

        Website::factory()
            ->for($user)
            ->has(PageView::factory()->count(100), 'pageViews')
            ->create([
                'domain' => 'https://seanwash.com.test',
            ]);
    }
}
