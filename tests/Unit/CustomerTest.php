<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('has customers route', function () {
  get('/dashboard/customers')->assertStatus(302);
});

test('has customers if authenticated', function () {
    $user = User::factory()->create();
    actingAs($user)->get('/dashboard/customers')->assertStatus(200);
});
