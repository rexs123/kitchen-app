<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('has orders route', function () {
  get('/dashboard/orders')->assertStatus(302);
});

test('has orders if authenticated', function () {
    $user = User::factory()->create();
    actingAs($user)->get('/dashboard/orders')->assertStatus(200);
});
