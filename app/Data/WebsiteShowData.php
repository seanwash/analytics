<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class WebsiteShowData extends Data
{
    public function __construct(
        public WebsiteData $website,
        public int $liveSessionCount,
        public int $sessionCount,
        public int $pageviewCount,
        #[DataCollectionOf(PageViewData::class)]
        public DataCollection $pageviews,
    ) {
    }
}
