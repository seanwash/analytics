<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class WebsiteShowData extends Data
{
    public function __construct(
        public WebsiteData $website,
        public $chart,
        public int $liveSessionCount,
        public int $sessionCount,
        public int $pageviewCount,

        /** @var DataCollection<RollupData> */
        public DataCollection $paths,

        /** @var DataCollection<RollupData> */
        public DataCollection $countries,

        /** @var DataCollection<RollupData> */
        public DataCollection $screenSizes,
    ) {
    }
}
