@section('title', "Dashboard: Customer - {$customer->first_name} {$customer->last_name}")
@extends('layouts.dashboard')
@section('content')
    <div class="p-4">
        <h1 class="text-xl font-bold mb-1">Viewing Customer: {{ $customer->id }}</h1>
        <a href="{{ route('dashboard.customers.edit', $customer) }}" class="mb-3 block">Edit</a>
        <ul>
            <li>
                <small class="block font-bold">
                    Customer Name
                </small>
                {{ $customer->first_name }}
                {{ $customer->last_name }}
            </li>
            <li>
                <small class="block font-bold">
                    Address
                </small>
                <div>
                    <span class="font-bold">Address 1</span>:
                    {{ $customer->address_1 }}
                </div>
                @if($customer->address_2)
                    <div>
                        <span class="font-bold">Address 2</span>:
                        {{ $customer->address_2 }}
                    </div>
                @endif
                <div>
                    <span class="font-bold">City</span>:
                    {{ $customer->city }}
                </div>
                @if($customer->state)
                    <div>
                        <span class="font-bold">State/Province</span>:
                        {{ $customer->state }}
                    </div>
                @endif
                <div>
                    <span class="font-bold">Country</span>:
                    {{ $customer->country }}
                </div>
                @if($customer->postal_code)
                    <div>
                        <span class="font-bold">Postal/Zip Code</span>:
                        {{ $customer->postal_code }}
                    </div>
                @endif
            </li>
            <li>
                <small class="block font-bold">
                    Email
                </small>
                {{ $customer->email  }}
            </li>
            <li>
                <small class="block font-bold">
                    Phone Number
                </small>
                {{ $customer->phone_number }}
            </li>
            <li>
                <small class="block font-bold">
                   Notes
                </small>
                {{ $customer->notes }}
            </li>
            <li>
                <small class="block font-bold">
                   Delivery Instructions
                </small>
                {{ $customer->delivery_instrctions }}
            </li>
            <li>
                <small class="block font-bold mb-1">
                    Allergies
                </small>
                <div class="-mx-1">
                    @foreach(json_decode($customer->allergies) as $allergy)
                        <span class="bg-gray-300 rounded py-1 px-2 inline-block mx-1">{{ ucfirst($allergy) }}</span>
                    @endforeach
                </div>
            </li>
            <li>
                <small class="block font-bold">
                    Charge for Delivery
                </small>
                {{ ($customer->charge_delivery)? 'Yes' : 'No' }}
            </li>
            <li>
                <small class="block font-bold">
                    Birthday
                </small>
                @if($customer->dob)
                    {{ $customer->dob->format('Y-m-d') }}
                    <br>
                    Age:  {{ $customer->dob->age }}
                @else
                    Birth date not set.
                @endif
            </li>
            <li>
                <small class="block font-bold">
                    Avatar
                </small>
                @if($customer->avatar)
                    <img src="{{ $customer->avatar }}" alt="{{ $customer->first_name }}" class="w-32 h-32 rounded p-1">
                @else
                    No avatar found.
                @endif
            </li>
            <li>
                <small class="block font-bold">
                    Customer Since
                </small>
                {{ $customer->created_at }}
            </li>
        </ul>
    </div>
@endsection
