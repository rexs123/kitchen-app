<?php

use App\Models\User;
use function Pest\Laravel\get;

test('has home', function () {
    User::factory()->create();
    get('/')->assertStatus(200);
});
