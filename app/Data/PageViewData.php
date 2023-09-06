<?php

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class PageViewData extends Data
{
    public function __construct(
        public readonly string $id,
        public readonly string $session_id,
        public string $website_id,
        public string $host,
        public string $path,
        public string $country_code,
        public string $screen_size,
        public string $user_agent,
        public readonly Carbon $created_at,
        public readonly Carbon $updated_at,
    ) {
    }
}
