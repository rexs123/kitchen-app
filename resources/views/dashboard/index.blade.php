@section('title', "Dashboard")
@extends('layouts.dashboard')
@section('content')
    <div class="w-1/2">
        <div class="flex">
            <div class="w-1/2">
                <h1 class="text-xl">Orders</h1>
            </div>
            <div class="w-1/2 text-right">
                <a href="{{ route('dashboard.orders.create') }}" class="text-xs font-bold hover:text-blue-500">Create new Order</a>
            </div>
        </div>
        <div class="flex text-xs py-2 border-b border-gray-200">
            <div class="w-64">Customer</div>
            <div class="w-32">Status</div>
            <div class="w-32">Total Products</div>
            <div class="w-32">Total Due</div>
            <div class="w-32">Taxes</div>
            <div class="w-48">Completed At</div>
        </div>
        @foreach($orders as $order)
            <div class="flex">
                <div class="w-64">
                    <a
                        href="{{ route('dashboard.customers.show', $order->customer->id) }}"
                        class="text-blue-600 hover:text-purple-500"
                    >
                    {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                    </a>
                </div>
                <div class="w-32">{{ ucwords($order->status) }}</div>
                <div class="w-32">{{ $order->total_products }}</div>
                <div class="w-32">${{ $order->total_price }}</div>
                <div class="w-32">${{ $order->taxes }}</div>
                <div class="w-48">{{ ($order->completed_at)? $order->completed_at->diffForHumans() : 'Incomplete' }}</div>
            </div>
        @endforeach
        {{ $orders->links() }}
    </div>
@endsection
