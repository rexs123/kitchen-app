@section('title', "Dashboard: Products")
@extends('layouts.dashboard')
@section('content')
    <div class="p-4">
        <div class="flex">
            <div class="w-1/2">
                <h1 class="text-xl">Products</h1>
            </div>
            <div class="w-1/2 text-right">
                <a href="{{ route('dashboard.products.create') }}" class="text-xs font-bold hover:text-blue-500">Add New Product</a>
            </div>
        </div>
        <div class="flex text-xs py-2 border-b border-gray-200">
            <div class="w-64">Name</div>
            <div class="w-96">Description</div>
            <div class="w-96">Ingredients</div>
            <div class="w-96">Allergens</div>
            <div class="w-32">Price</div>
            <div class="w-32">Weight</div>
        </div>
        @foreach($products as $product)
            <div class="flex py-2">
                <div class="w-64">
                    <a href="{{ route('dashboard.products.show', $product) }}" class="text-blue-500">
                        {{ $product->name }}
                    </a>
                </div>
                <div class="w-96">
                    {{ $product->description }}
                </div>
                <div class="w-96">
                    @foreach((array)json_decode($product->ingredients) as $allergen)
                        {{ ucfirst($allergen) }}<span class="last:hidden">,</span>
                    @endforeach
                </div>
                <div class="w-96">
                    @foreach((array)json_decode($product->allergens) as $allergen)
                        {{ ucfirst($allergen) }}<span class="last:hidden">,</span>
                    @endforeach
                </div>
                <div class="w-32">${{ $product->price }}</div>
                <div class="w-32">{{ $product->weight }}</div>
            </div>
        @endforeach
        {{ $products->links() }}
    </div>
@endsection
