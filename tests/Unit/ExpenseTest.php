<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('has expenses route', function () {
  get('/dashboard/expenses')->assertStatus(302);
});

test('has expenses if authenticated', function () {
    $user = User::factory()->create();
    actingAs($user)->get('/dashboard/expenses')->assertStatus(200);
});
