@section('title', "Dashboard: Order - Editing #{$order->id}")
@extends('layouts.dashboard')
@section('content')
    <div class="p-4">
        <div class="mb-3">
            <h1 class="text-xl font-bold">Creating a new Customer</h1>
        </div>
        <form action="{{ route('dashboard.orders.update', $order) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="w-1/4 my-1">
                <label for="customer_id" class="mb-1 block font-semibold">Customer</label>
                <select
                    type="text"
                    id="customer_id"
                    name="customer_id"
                    class="border border-gray-200 block p-1 block w-full @error('customer_id') border-red-600 @enderror"
                >
                    <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                </select>
                @error('customer_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="w-1/4 my-1">
                <label for="status" class="mb-1 block font-semibold">Status</label>
                <select
                    type="text"
                    id="status"
                    name="status"
                    class="border border-gray-200 block p-1 w-full @error('status') border-red-600 @enderror"
                >
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                    <option value="delivered">Delivered & Paid</option>
                    <option value="delivered_unpaid">Unpaid, Delivered</option>
                    <option value="picked_up">Picked Up</option>
                    <option value="on_hold">On Hold</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                @error('status') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="w-1/4 my-1">

                <label for="products" class="mb-1 block font-semibold">Product</label>
                <select
                    multiple
                    type="text"
                    id="products"
                    name="products[]"
                    class="border border-gray-200 block p-1 block w-full @error('products') border-red-600 @enderror"
                >
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" @if($order->products->firstWhere('id', $product->id)) selected @endif>
                            ${{ $product->price }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{ $product->name }}

                        </option>
                    @endforeach
                </select>
                @error('products') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="w-1/4 my-1">
                <label for="delivered_at" class="mb-1 font-semibold block">Delivered or Picked up At</label>
                <input
                    type="datetime-local"
                    {{--                    todo: change this for a vue component, firefox does NOT support type=date --}}
                    id="delivered_at"
                    name="delivered_at"
                    placeholder="Delivered or Picked up At"
                    value="{{ old('delivered_at') }}"
                    class="border border-gray-200 block p-1 w-full @error('delivered_at') border-red-600 @enderror"
                >
                @error('delivered_at') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="w-1/4 my-1">
                <label for="completed_at" class="mb-1 font-semibold block">Completed At</label>
                <input
                    type="datetime-local"
                    {{--                    todo: change this for a vue component, firefox does NOT support type=date --}}
                    id="completed_at"
                    name="completed_at"
                    placeholder="When was the order completed at."
                    value="{{ old('completed_at') }}"
                    class="border border-gray-200 block p-1 w-full @error('completed_at') border-red-600 @enderror"
                >
                @error('completed_at') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>


            <button type="submit" class="border border-gray-300 px-5 py-2">Update {{ $customer->first_name }}'s Order</button>
        </form>
    </div>
@endsection
