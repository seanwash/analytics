<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use function Pest\Laravel\actingAs;

it('authenticates and redirects the user to the website listing', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'),
    ]);

    $this->post(
        route('authenticated-session.store'),
        [
            'email' => $user->email,
            'password' => 'password',
        ]
    )->assertRedirect(
        route('websites.index')
    );

    $this->assertAuthenticatedAs($user);
});

it('validates the credentials input', function () {
    $this->post(
        route('authenticated-session.store'),
        [
            'email' => 'some@user.com',
            'password' => 'password',
        ]
    )->assertInvalid([
        'email' => "The provided credentials don't match our records.",
    ]);
});

it('redirects already authenticated users', function () {
    actingAs(User::factory()->create());

    $this->post(
        route('authenticated-session.store'),
        [
            'email' => 'some@user.com',
            'password' => 'password',
        ]
    )->assertRedirect(
        route('websites.index')
    );
});
