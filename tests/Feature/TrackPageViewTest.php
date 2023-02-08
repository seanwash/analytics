<?php

namespace Tests\Feature;

use App\Models\PageView;
use App\Models\Website;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('does not respond to non application/json requests', function () {
    $website = Website::factory()->create();
    $this->get(route('pageview.track', $website))->assertStatus(405);
});

it('creates a new PageView', function () {
    $website = Website::factory()->create();

    $pageViewParams = PageView::factory()
        ->for($website)
        ->make();

    assertDatabaseCount('page_views', 0);

    $this->getJson(
        route('pageview.track', [$website, ...$pageViewParams->toArray()]),
    )->assertCreated();

    assertDatabaseHas('page_views', ['website_id' => $website->id]);
});

it('validates the host input');
it('validates the path input');
it('validates the country_code input');
it('validates the screen_size input');
it('validates the user_agent input');
