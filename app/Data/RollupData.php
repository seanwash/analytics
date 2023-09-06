<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class RollupData extends Data
{
    public function __construct(
        public string $value,
        public int $count,
    ) {
    }
}
