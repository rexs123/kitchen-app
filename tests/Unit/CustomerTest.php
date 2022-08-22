<?php

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('if user redirected to login', function () {
  get('/dashboard/customers')->assertStatus(302);
});

test('if logged in user can view customers', function () {
    $user = User::factory()->create();
    $customer = Customer::factory()->create();

    // todo: fix error 500 as address casts as array, but views as string
    actingAs($user)->get('/dashboard/customers')->assertStatus(200);
});

test('if logged in user can create a new customer', function () {
    $user = User::factory()->create();

    actingAs($user)->get('/dashboard/customers/new')->assertStatus(200);
});

test('if a new customer can be stored', function () {
    $user = User::factory()->create();

    actingAs($user)->post('/dashboard/customers/store', [
        'address' => [
            'address_1' => fake()->streetAddress(),
            'address_2' => '',
            'city' => fake()->city(),
            'state' => fake()->realTextBetween(5, 24),
            'country' => fake()->country(),
            'postal_code' => fake()->postcode(),
        ],
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'email' => fake()->safeEmail(),
        'phone_number' => fake()->phoneNumber(),
        'allergies' => json_encode([
            fake()->realTextBetween(5, 24),
        ]),
        'charge_delivery' => fake()->biasedNumberBetween(0, 1),
        'dob' => null,
        'avatar' => null,
    ])->assertSessionHasNoErrors()->assertSessionHas('success')->assertRedirect('/dashboard/customers/1');
});

test('if a customer can be viewed', function () {
    $user = User::factory()->create();
    $customer = Customer::factory()->create();

    // todo: fix error 500 as address casts as array, but views as string
    actingAs($user)->get('/dashboard/customers/1')->assertStatus(200);
});

test('if a customer can be edited', function () {
    $user = User::factory()->create();
    $customer = Customer::factory()->create();

    // todo: fix error 500 as address casts as array, but views as string
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

test('if an avatar can  be uploaded', function () {
    $user = User::factory()->create();
    $customer = Customer::factory()->create();

    actingAs($user)->put('/dashboard/customers/1/update', [
        'address' => $customer->address,
        'email' => 'me@rexsdev.com',
        'phone_number' => $customer->phone_number,
        'allergies' => $customer->allergies,
        'charge_delivery' => 1,
        'avatar' => UploadedFile::fake()->image('avatar.jpg'),
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
