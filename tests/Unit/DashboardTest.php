<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('redirects to login', function () {
  get('/dashboard')->assertStatus(302);
});

test('has dashboard if authenticated', function () {
    $user = User::factory()->create();
    actingAs($user)->get('/dashboard')->assertStatus(200);
});
