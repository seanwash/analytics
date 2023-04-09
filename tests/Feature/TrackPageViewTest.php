<?php

namespace Tests\Feature;

use App\Models\PageView;
use App\Models\Website;
use Illuminate\Testing\TestResponse;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('does not respond to non application/json requests', function () {
    $website = Website::factory()->create();
    $this->get(route('pageview.track', $website))->assertStatus(405);
});

it('creates a new PageView', function () {
    $website = Website::factory()->create();

    $pageView = PageView::factory()
        ->for($website)
        ->make([
            'host' => $website->domain,
        ]);

    assertDatabaseCount('page_views', 0);

    trackPageview($website, [
        'h' => $pageView->host,
        'p' => $pageView->path,
        'tz' => fake()->timezone($pageView->country_code),
        'ss' => $pageView->screen_size,
        'ua' => $pageView->user_agent,
    ])->assertCreated();

    assertDatabaseHas('page_views', ['website_id' => $website->id]);
});

it('validates the host input matches a website domain', function () {
    $website = Website::factory()->create();

    $pageView = PageView::factory()
        ->for($website)
        ->make([
            'host' => 'https://invalid-host.com',
        ]);

    trackPageview($website, [
        'h' => $pageView->host,
        'p' => $pageView->path,
        'tz' => fake()->timezone($pageView->country_code),
        'ss' => $pageView->screen_size,
        'ua' => $pageView->user_agent,
    ])->assertForbidden();
});

it('validates the host input');
it('validates the path input');
it('validates the country_code input');
it('validates the screen_size input');
it('validates the user_agent input');

function trackPageview(Website $website, array $params = []): TestResponse
{
    return test()->getJson(
        route('pageview.track', array_merge([$website], $params)),
    );
}
