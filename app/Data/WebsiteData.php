<?php

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class WebsiteData extends Data
{
    public function __construct(
        public readonly string $id,
        public string $domain,
        public readonly Carbon $created_at,
        public readonly Carbon $updated_at,
    ) {
    }
}
