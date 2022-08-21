<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('has products route', function () {
  get('/dashboard/products')->assertStatus(302);
});

test('has products if authenticated', function () {
    $user = User::factory()->create();
    actingAs($user)->get('/dashboard/products')->assertStatus(200);
});
