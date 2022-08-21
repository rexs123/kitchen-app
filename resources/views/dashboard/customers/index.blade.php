@section('title', "Dashboard: Customers")
@extends('layouts.dashboard')
@section('content')
    <div class="p-4">
        <div class="flex">
            <div class="w-1/2">
                <h1 class="text-xl">Customers</h1>
            </div>
            <div class="w-1/2 text-right">
                <a href="{{ route('dashboard.customers.create') }}" class="text-xs font-bold hover:text-blue-500">Create New Customer</a>
            </div>
        </div>

        <div class="flex text-xs py-2 border-b border-gray-200">
            <div class="w-64">Customer</div>
            <div class="w-64">Email Address</div>
            <div class="w-64">Phone Number</div>
            <div class="w-96">Address</div>
            <div class="w-96">Alleges</div>
            <div class="w-24">Delivery Charge?</div>
        </div>
        @foreach($customers as $customer)
            <div class="flex">
                <div class="w-64">
                    <a
                        href="{{ route('dashboard.customers.show', $customer->id) }}"
                        class="text-blue-600 hover:text-purple-500"
                    >
                        {{ $customer->first_name }} {{ $customer->last_name }}
                    </a>
                </div>
                <div class="w-64">{{ $customer->email }}</div>
                <div class="w-64">{{ $customer->phone_number }}</div>
                <div class="w-96">
                    @foreach(collect(json_decode($customer->address))->filter(function ($value) { return !empty($value); }) as $key => $value)
                        <div>
                            <span class="font-bold">{{ ucwords(str_replace("_", " ", $key)) }}</span>:
                            {{ $value }}
                        </div>
                    @endforeach
                </div>
                <div class="w-96">
                    @foreach(json_decode($customer->allergies) as $allergy)
                        {{ ucfirst($allergy) }}<span class="last:hidden">,</span>
                    @endforeach
                </div>
                <div class="w-24">
                    {{ $customer->charge_delivery?  'Yes' : 'No' }}
                </div>
            </div>
        @endforeach
        {{ $customers->links() }}
    </div>
@endsection
