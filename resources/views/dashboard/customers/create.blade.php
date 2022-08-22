@section('title', "Dashboard: New Customer")
@extends('layouts.dashboard')
@section('content')
    <div class="p-4">
        <div class="mb-3">
            <h1 class="text-xl font-bold">Creating a new Customer</h1>
        </div>
        <form action="{{ route('dashboard.customers.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="flex my-3">
                <div class="w-1/4 my-1">
                    <label for="first_name" class="mb-1 block font-semibold">First Name</label>
                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        placeholder="First name"
                        value="{{ old('first_name') }}"
                        class="border border-gray-200 block p-1 block w-full @error('first_name') border-red-600 @enderror"
                    >
                    @error('first_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="flex my-3">
                <div class="w-1/4 my-1">
                    <label for="last_name" class="mb-1 block font-semibold">Last Name</label>
                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        placeholder="Last name"
                        value="{{ old('last_name') }}"
                        class="border border-gray-200 block p-1 block w-full @error('last_name') border-red-600 @enderror"
                    >
                    @error('last_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="flex my-3">
                <div class="w-1/4 my-1">
                    <label for="address_1" class="mb-1 block font-semibold">Address 1</label>
                    <input
                        type="text"
                        id="address_1"
                        name="address_1"
                        placeholder="Address 1"
                        value="{{ old('address_1') }}"
                        class="border border-gray-200 block p-1 block w-full @error("address_1") border-red-600 @enderror"
                    >
                    @error("address_1") <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="w-1/4 my-1">
                    <label for="address_2" class="mb-1 block font-semibold">Address 2</label>
                    <input
                        type="text"
                        id="address_2"
                        name="address_2"
                        placeholder="Address 2"
                        value="{{ old('address_2') }}"
                        class="border border-gray-200 block p-1 block w-full @error("address_2") border-red-600 @enderror"
                    >
                    @error("address_2") <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="w-1/4 my-1">
                    <label for="city" class="mb-1 block font-semibold">City</label>
                    <input
                        type="text"
                        id="city"
                        name="city"
                        placeholder="City"
                        value="{{ old('city') }}"
                        class="border border-gray-200 block p-1 block w-full @error("city") border-red-600 @enderror"
                    >
                    @error("city") <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="w-1/4 my-1">
                    <label for="state" class="mb-1 block font-semibold">State or Province</label>
                    <input
                        type="text"
                        id="state"
                        name="state"
                        placeholder="State or Province"
                        value="{{ old('state') }}"
                        class="border border-gray-200 block p-1 block w-full @error("state") border-red-600 @enderror"
                    >
                    @error("state") <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="w-1/4 my-1">
                    <label for="country" class="mb-1 block font-semibold">Country</label>
                    <input
                        type="text"
                        id="country"
                        name="country"
                        placeholder="Country"
                        value="{{ old('country') }}"
                        class="border border-gray-200 block p-1 block w-full @error("country") border-red-600 @enderror"
                    >
                    @error("country") <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="w-1/4 my-1">
                    <label for="postal_code" class="mb-1 block font-semibold">Postal Code or Zip Code</label>
                    <input
                        type="text"
                        id="postal_code"
                        name="postal_code"
                        placeholder="Postal Code or Zip Code"
                        value="{{ old('postal_code') }}"
                        class="border border-gray-200 block p-1 block w-full @error("postal_code") border-red-600 @enderror"
                    >
                    @error("postal_code") <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="w-1/4 my-1">
                <label for="email" class="mb-1 block font-semibold">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Email Address"
                    value="{{ old('email') }}"
                    class="border border-gray-200 block p-1 block w-full @error('email') border-red-600 @enderror"
                >
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="w-1/4 my-1">
                <label for="phone_number" class="mb-1 block font-semibold">Phone Number</label>
                <input
                    type="tel"
                    id="phone_number"
                    name="phone_number"
                    placeholder="Phone Number"
                    value="{{ old('phone_number') }}"
                    class="border border-gray-200 block p-1 block w-full @error('phone_number') border-red-600 @enderror"
                >
                @error('phone_number') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="w-1/4 my-1">
                <label for="allergies" class="mb-1 block font-semibold">Allergies</label>
                <input
                    type="text"
                    id="allergies"
                    name="allergies"
                    placeholder="Allergies"
                    value="{{ old('allergies') }}"
                    class="border border-gray-200 block p-1 block w-full @error('allergies') border-red-600 @enderror"
                >
                <p class="text-sm text-gray-400">Individual allergies to be seperated by comma.</p>
                @error('allergies') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="w-1/4 my-1">
                <label for="notes" class="mb-1 block font-semibold">Notes</label>
<textarea
    type="text"
    id="notes"
    name="notes"
    placeholder="Notes"
    class="border border-gray-200 block p-1 block w-full @error('notes') border-red-600 @enderror"
>{{ old('notes') }}</textarea>
                @error('notes') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="w-1/4 my-1">
                <label for="delivery_instructions" class="mb-1 block font-semibold">Delivery Instructions</label>
<textarea
    type="text"
    id="delivery_instructions"
    name="delivery_instructions"
    placeholder="Delivery Instructions"
    class="border border-gray-200 block p-1 block w-full @error('delivery_instructions') border-red-600 @enderror"
>{{ old('delivery_instructions') }}</textarea>
                @error('delivery_instructions') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="w-1/4 my-1">
                <input
                    type="checkbox"
                    id="charge_delivery"
                    name="charge_delivery"
                    placeholder="Charge for Delivery?"
                    value="0"
                    class="border border-gray-200 inline-block mr-1 px-1 @error('charge_delivery') border-red-600 @enderror"
                >
                <label for="charge_delivery" class="mb-1 font-semibold inline-block">Charge for Delivery</label>
                @error('charge_delivery') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="w-1/4 my-1">
                <input
                    type="date"
{{--                    todo: change this for a vue component, firefox does NOT support type=date --}}
                    id="dob"
                    name="dob"
                    placeholder="Customer date of birth"
                    value="{{ old('dob') }}"
                    class="border border-gray-200 inline-block mr-1 px-1 @error('dob') border-red-600 @enderror"
                >
                <label for="dob" class="mb-1 font-semibold inline-block">Date of <birth></birth></label>
                @error('dob') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="w-1/4 my-1">
                <input
                    type="file"
                    id="avatar"
                    name="avatar"
                    class="border border-gray-200 inline-block mr-1 px-1 @error('avatar') border-red-600 @enderror"
                >
                <label for="avatar" class="mb-1 font-semibold inline-block">Upload Avatar</label>
                @error('avatar') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>


            <button type="submit" class="border border-gray-300 px-5 py-2">Create new Customer</button>
        </form>
    </div>
@endsection
