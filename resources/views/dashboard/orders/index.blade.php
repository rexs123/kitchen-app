@section('title', "Dashboard: Orders")
@extends('layouts.dashboard')
@section('content')
    <div class="p-4">
        <div class="flex">
            <div class="w-1/2">
                <h1 class="text-xl">Orders</h1>
            </div>
            <div class="w-1/2 text-right">
                <a href="{{ route('dashboard.orders.create') }}" class="text-xs font-bold hover:text-blue-500">Create New Order</a>
            </div>
        </div>

        <div class="flex text-xs py-2 border-b border-gray-200">
            <div class="w-96">Customer</div>
            <div class="w-64">Status</div>
            <div class="w-64">Number of Products</div>
            <div class="w-64">Handled by</div>
            <div class="w-24">Delivered</div>
            <div class="w-48">Completed</div>
            <div class="w-48">Created At</div>
        </div>
        @foreach($orders as $order)
            <div class="flex py-2">
                <div class="w-96">
                    <a href="{{ route('dashboard.orders.show', $order) }}" class="text-blue-500">
                        {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                    </a>
                </div>
                <div class="w-64">{{ ucwords($order->status) }}</div>
                <div class="w-64">{{ $order->total_products }}</div>
                <div class="w-64">{{ $order->user->first_name }}</div>
                <div class="w-24">{{ ($order->delivered_at)?: 'No' }}</div>
                <div class="w-48">{{ ($order->created)?: 'No' }}</div>
                <div class="w-48">{{ $order->created_at }}</div>
            </div>

        @endforeach
        {{ $orders->links() }}
    </div>
@endsection
