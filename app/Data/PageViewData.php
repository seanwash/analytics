<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class PageViewData extends Data
{
    public function __construct(
        public readonly string $id,
        public readonly string $session_id,
        public string $website_id,
        public string $host,
        public string $path,
        public string $screen_size,
        public string $user_agent,
    ) {
    }
}
