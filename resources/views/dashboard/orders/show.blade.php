@section('title', "Dashboard: Orders")
@extends('layouts.dashboard')
@section('content')
    <div class="p-4">
        <div>
            <h1 class="text-xl font-bold">Orders: #{{ $order->id }}</h1>
            <a href="{{ route('dashboard.orders.edit', $order) }}" class="text-blue-500">Edit Order</a>
        </div>
        <div class="flex my-3">
            <div class="w-1/4">
                <h1 class="text-lg font-semibold block">Status</h1>
                <p>{{ ucwords($order->status) }}</p>
            </div>
            <div class="w-1/4 flex">
                <div class="w-48">
                    <h1 class="text-lg font-semibold block">Amount Due</h1>
                    ${{ $order->total_price }}
                </div>
                <div class="w-48">
                    <h1 class="text-lg font-semibold block">Taxes Due</h1>
                    ${{ $order->taxes }}
                </div>
            </div>
        </div>
        <div class="flex w-1/2">
            <div class="w-1/2">
                <div class="my-3">
                    <h1 class="text-lg font-semibold">Customer</h1>
                    {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                </div>
                <div class="my-3">
                    <h1 class="text-lg font-semibold">Address</h1>
                    <div>
                        <span class="font-bold text-gray-400 block text-sm">Address 1</span>
                        {{ $order->customer->address_1 }}
                    </div>
                    @if($order->customer->address_2)
                        <div>
                            <span class="font-bold text-gray-400 block text-sm">Address 2</span>
                            {{ $order->customer->address_2 }}
                        </div>
                    @endif
                    <div>
                        <span class="font-bold text-gray-400 block text-sm">City</span>
                        {{ $order->customer->city }}
                    </div>
                    @if($order->customer->state)
                        <div>
                            <span class="font-bold text-gray-400 block text-sm">State/Province</span>
                            {{ $order->customer->state }}
                        </div>
                    @endif
                    <div>
                        <span class="font-bold text-gray-400 block text-sm">Country</span>
                        {{ $order->customer->country }}
                    </div>
                    @if($order->customer->postal_code)
                        <div>
                            <span class="font-bold text-gray-400 block text-sm">Postal/Zip Code</span>
                            {{ $order->customer->postal_code }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="w-1/2">
                <div class="my-3">
                    <h1 class="text-lg font-semibold">Order</h1>
                </div>
                <div class="my-3">
                    <h1 class="text-lg font-semibold">Products</h1>
                    @foreach($order->products as $product)
                        <div class="flex">
                            <a href="{{ route('dashboard.products.show', $product) }}" class="text-blue-500 w-1/4">
                                {{ $product->name }}
                            </a>
                            <div class="w-1/4 text-right">
                                ${{ $product->price }}
                            </div>
                        </div>
                        @if($product->allergens === $order->customer->allergies)
                            <div class="text-red-500">
                                Warning this customer might be allergic to this product!
                            </div>
                            <div>
                                <strong class="block">Allergens Detected</strong>
                                {{ implode(',', json_decode($product->allergens)) }}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
