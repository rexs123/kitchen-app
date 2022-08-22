<?php

use App\Models\User;
use Illuminate\Support\Str;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('if a user exists', function () {
    expect(User::count())->toBe(0);
});

test('if the frontend redirects', function () {
    get('/')->assertRedirect('/setup')->assertStatus(302);
});

test('setup page cannot be viewed once a user is created', function () {
    User::factory()->create();
    get('/setup')->assertStatus(404);
});

test('if a user can be setup', function () {
    post('/setup', [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'email' => fake()->safeEmail(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ])->assertStatus(302);
});

test('if a user can still be made once the first user is made', function () {
    User::factory()->create();

    post('/setup', [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'email' => fake()->safeEmail(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ])->assertStatus(404);
});
