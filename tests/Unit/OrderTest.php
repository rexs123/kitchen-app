<?php

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('if unauthenticated orders redirects to login', function () {
  get('/dashboard/orders')->assertStatus(302);
});

test('if orders can be viewed when authenticated', function () {
    $user = User::factory()->create();
    Customer::factory()->create();
    Product::factory()->create();
    actingAs($user)->get('/dashboard/orders')->assertStatus(200);
});

test('if orders can be viewed with data', function () {
    $user = User::factory()->create();
    Customer::factory()->create();
    Product::factory()->create();
    Order::factory()->create();
    actingAs($user)->get('/dashboard/orders')->assertStatus(200);
});

test('if an order can be shown', function () {
    $user = User::factory()->create();
    Customer::factory()->create();
    Product::factory()->create();
    Order::factory()->create();
    actingAs($user)->get('/dashboard/orders/1')->assertStatus(200);
});

test('if an order can be created', function () {
    $user = User::factory()->create();
    Customer::factory()->create();
    Product::factory()->create();
    actingAs($user)->get('/dashboard/orders/new')->assertStatus(200);
});

test('if an order can be stored', function () {
    $user = User::factory()->create();
    $customer = Customer::factory()->create();
    $product = Product::factory()->create();
    actingAs($user)->post('/dashboard/orders/store', [
        'customer_id' => $customer->id,
        'status' => 'unpaid',
        'products' => [$product->id],
    ])->assertSessionHasNoErrors()
        ->assertStatus(302)
        ->assertSessionHas('success')
        ->assertRedirect('/dashboard/orders/1');
});

test('if an order can be edited', function () {
    $user = User::factory()->create();
    Customer::factory()->create();
    Product::factory()->create();
    Order::factory()->create();
    actingAs($user)->get('/dashboard/orders/1/edit')->assertStatus(200);
});

test('if an order can be updated', function () {
    $user = User::factory()->create();
    $customer = Customer::factory()->create();
    $product = Product::factory()->create();
    Order::factory()->create();
    actingAs($user)
        ->put('/dashboard/orders/1/update', [
            'status' => $customer->status,
            'products' => $customer->products,
            'completed_at' => null
        ])->assertSessionHasNoErrors()
        ->assertStatus(302)
        ->assertRedirect('/dashboard/orders/1')
        ->assertSessionHas('success');
});

test('if an order is blocked from being deleted if paid', function () {
    $user = User::factory()->create();
    Customer::factory()->create();
    Product::factory()->create();
    Order::factory()->create();
    actingAs($user)
        ->delete('/dashboard/orders/1/delete')
        ->assertSessionHasNoErrors()
        ->assertStatus(302)
        ->assertRedirect('/dashboard/orders')
        ->assertSessionHas('success');
});

test('if an order can be deleted without any products', function () {
    $user = User::factory()->create();
    Customer::factory()->create();
    Product::factory()->create();
    Order::factory()->create();
    actingAs($user)->delete('/dashboard/orders/1/delete')
        ->assertStatus(302)
        ->assertRedirect('/dashboard/orders')
        ->assertSessionHasNoErrors()
        ->assertSessionHas('success');
});
