@section('title', "Dashboard: Customer - {$customer->first_name} {$customer->last_name}")
@extends('layouts.dashboard')
@section('content')
    <div class="p-4">
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
                @foreach(collect(json_decode($customer->address))->filter(function ($value) { return !empty($value); }) as $key => $value)
                    <div>
                        <span class="font-bold">{{ ucwords(str_replace("_", " ", $key)) }}</span>:
                        {{ $value }}
                    </div>
                @endforeach
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
        </ul>
    </div>
@endsection
