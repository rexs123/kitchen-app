<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('has products redirects to login', function () {
    get('/dashboard/products')->assertStatus(302);
});

test('can the products route be viewed', function () {
    $product = Product::factory()->create();
    $user = User::factory()->create();
    actingAs($user)->get('/dashboard/products')->assertStatus(200);
});

test('has products if authenticated', function () {
    $user = User::factory()->create();
    actingAs($user)->get('/dashboard/products')->assertStatus(200);
});

test('if a product can be created', function () {
    $user = User::factory()->create();
    actingAs($user)->get('/dashboard/products/new')->assertStatus(200);
});

test('if a product can be stored', function () {
    $user = User::factory()->create();
    actingAs($user)->post('/dashboard/products/store', [
        'name' => 'Dhal',
        'image' => null,
        'description' => 'A dhal',
        'ingredients' => json_encode('dhal, tomatoes, coriander'),
        'allergens' => json_encode('none'),
        'price' => 20,
        'weight' => 1,
        'cost_of_materials' => 0.90,
        'cost_of_ingredients' => 7.50
    ])
        ->assertSessionHasNoErrors()
        ->assertStatus(302)
        ->assertRedirect('dashboard/products/1')
        ->assertSessionHas('success');
});

test('if a product can be viewed', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();
    actingAs($user)
        ->get('/dashboard/products/1')
        ->assertSessionHasNoErrors()
        ->assertStatus(200);
});

test('if a product can be edited', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();
    actingAs($user)
        ->get('/dashboard/products/1/edit')
        ->assertSessionHasNoErrors()
        ->assertStatus(200);
});

test('if a product can be updated', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();
    actingAs($user)
        ->put('/dashboard/products/1/update', [
            'name' => $product->name,
            'image' => null,
            'description' => $product->description,
            'ingredients' => json_encode($product->ingredients),
            'allergens' => json_encode($product->allergens),
            'price' => $product->price,
            'weight' => $product->weight,
            'cost_of_materials' => $product->cost_of_materials,
            'cost_of_ingredients' => $product->cost_of_ingredients,
        ])
        ->assertSessionHasNoErrors()
        ->assertStatus(302)
        ->assertSessionHas('success')
        ->assertRedirect('/dashboard/products/1');
});

test('if a product can have an image uploaded', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();
    actingAs($user)
        ->put('/dashboard/products/1/update', [
            'name' => $product->name,
            'description' => $product->description,
            'ingredients' => json_encode($product->ingredients),
            'allergens' => json_encode($product->allergens),
            'price' => $product->price,
            'weight' => $product->weight,
            'cost_of_materials' => $product->cost_of_materials,
            'cost_of_ingredients' => $product->cost_of_ingredients,
            'image' => UploadedFile::fake()->image('avatar.jpg'),
        ])
        ->assertSessionHasNoErrors()
        ->assertStatus(302)
        ->assertSessionHas('success')
        ->assertRedirect('/dashboard/products/1');
});

test('if a product can be deleted', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();
    actingAs($user)
        ->delete('/dashboard/products/1/delete')
        ->assertSessionHasNoErrors()
        ->assertStatus(302)
        ->assertSessionHas('success')
        ->assertRedirect('/dashboard/products');
});
