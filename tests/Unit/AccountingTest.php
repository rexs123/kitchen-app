<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('has accounting route', function () {
  get('/dashboard/accounting')->assertStatus(302);
});

test('has accounting if authenticated', function () {
    $user = User::factory()->create();
    actingAs($user)->get('/dashboard/accounting')->assertStatus(200);
});
