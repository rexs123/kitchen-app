@section('title', "Dashboard: Product - {$product->name}")
@extends('layouts.dashboard')
@section('content')
    <div class="p-4">
        <h1 class="text-xl font-bold mb-1">Viewing Product: {{ $product->name }}</h1>
        <a href="{{ route('dashboard.products.edit', $product) }}" class="mb-3 block">Edit</a>
        <ul>
            <li>
                <small class="block font-bold my-1">
                    Product Name
                </small>
                {{ $product->name }}
            </li>
            <li>
                <small class="block font-bold my-1">
                    Ingredients
                </small>
                <div class="-mx-1">
                    @foreach((array)json_decode($product->ingredients) as $ingredient)
                        <span class="bg-gray-300 rounded py-1 px-2 inline-block mx-1">{{ ucfirst($ingredient) }}</span>
                    @endforeach
                </div>
            </li>
            <li>
                <small class="block font-bold my-1">
                    Allergens
                </small>
                <div class="-mx-1">
                    @foreach((array)json_decode($product->allergens) as $allergy)
                        <span class="bg-gray-300 rounded py-1 px-2 inline-block mx-1">{{ ucfirst($allergy) }}</span>
                    @endforeach
                </div>
            </li>
            <li>
                <small class="block font-bold my-1">
                    Description
                </small>
                <div>
                    <p>{{ $product->description }}</p>
                </div>
            </li>
            <li>
                <small class="block font-bold my-1">
                    Price
                </small>
                <div>
                    <p>${{ $product->price }}</p>
                </div>
            </li>
            <li>
                <small class="block font-bold my-1">
                    Weight
                </small>
                <div>
                    <p>{{ $product->weight }}</p>
                </div>
            </li>
            <li>
                <small class="block font-bold my-1">
                    Cost Of Ingredients
                </small>
                <div>
                    <p>${{ $product->cost_of_ingredients }}</p>
                </div>
            </li>
            <li>
                <small class="block font-bold my-1">
                    Cost Of Materials
                </small>
                <div>
                    <p>${{ $product->cost_of_materials }}</p>
                </div>
            </li>
            @if($product->image)
                <li>
                    <small class="block font-bold my-1">
                        image
                    </small>
                    <div>
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-96 h-96 object-cover">
                    </div>
                </li>
            @endif
            <li>
                <small class="block font-bold my-1">
                    Created At
                </small>
                <div>
                    <p>{{ $product->created_at }}</p>
                </div>
            </li>
        </ul>
    </div>
@endsection
