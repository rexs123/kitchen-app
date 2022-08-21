<?php

use App\Models\Customer;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('if user redirected to login', function () {
  get('/dashboard/customers')->assertStatus(302);
});

test('if logged in user can view customers', function () {
    $user = User::factory()->create();

    actingAs($user)->get('/dashboard/customers')->assertStatus(200);
});

test('if logged in user can create a new customer', function () {
    $user = User::factory()->create();

    actingAs($user)->get('/dashboard/customers/new')->assertStatus(200);
});

test('if a new customer can be stored', function () {
    $user = User::factory()->create();

    actingAs($user)->post('/dashboard/customers/store', [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'address' => json_encode([
            'address_1' => fake()->streetAddress(),
            'address_2' => '',
            'city' => fake()->city(),
            'state' => fake()->realTextBetween(5, 24),
            'country' => fake()->country(),
            'postal_code' => fake()->postcode(),
        ]),
        'email' => fake()->safeEmail(),
        'phone_number' => fake()->phoneNumber(),
        'allergies' => json_encode([
            fake()->realTextBetween(5, 24),
        ]),
        'charge_delivery' => fake()->biasedNumberBetween(0, 1),
        'dob' => null,
        'avatar' => null,
    ])->assertRedirect('/dashboard/customers/1');
});

test('if a customer can be edited', function () {
    $user = User::factory()->create();
    Customer::factory()->create();

    actingAs($user)->get('/dashboard/customers/1/edit')->assertStatus(200);
});

test('if a customer can be updated', function () {
    $user = User::factory()->create();
    $customer = Customer::factory()->create();

    actingAs($user)->put('/dashboard/customers/1/update', [
        'address' => $customer->address,
        'email' => 'me@rexsdev.com',
        'phone_number' => $customer->phone_number,
        'allergies' => $customer->allergies,
        'charge_delivery' => 1,
        'avatar' => null,
        'dob' => $customer->dob,
    ])->assertSessionHas('success')->assertSessionHasNoErrors()->assertRedirect('/dashboard/customers/1');
});

test('if a customer can be deleted', function () {
    $user = User::factory()->create();
    $customer = Customer::factory()->create();

    actingAs($user)->delete('/dashboard/customers/1/delete')
        ->assertSessionHas('success')
        ->assertSessionHasNoErrors()
        ->assertRedirect('/dashboard/customers');
});
