<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Inertia\Testing\AssertableInertia;
use function Pest\Laravel\actingAs;

it('renders the page', function () {
    $this->get(
        route('authenticated-session.create')

    )
        ->assertStatus(200)
        ->assertInertia(fn (AssertableInertia $page) => $page
            ->component('signin')
        );
});

it('redirects already signed in users', function () {
    actingAs(User::factory()->create());

    $this->get(
        route('authenticated-session.create')

    )->assertRedirect(
        route('websites.index')
    );
});
