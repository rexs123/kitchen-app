<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('dashboard.customers.index', [
            'customers' => Customer::orderBy('id', 'desc')->paginate(20)
        ]);
    }

    public function show(Customer $customer)
    {
        return view('dashboard.customers.show', [
            'customer' => $customer
        ]);
    }

    public function create()
    {
        return view('dashboard.customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {

        $randomString = Str::random('18');

        $customer = Customer::create([
            'cus_id' => "cus_{$randomString}",
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address_1' => $request->address_1,
            'address_2' => ($request->address_2)?: null,
            'city' => $request->city,
            'state' => ($request->state)?: null,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
            'email' => $request->email,
            'delivery_instructions' => $request->delivery_instructions,
            'notes' => $request->notes,
            'phone_number' => $request->phone_number,
            'allergies' => $request->allergies? json_encode(explode(",", $request->allergies)) : null,
            'charge_delivery' => ($request->charge_delivery)?: 0,
            'dob' => ($request->dob)?: null
        ]);

        if ($request->avatar) {
            $file = Storage::disk(env('FILESYSTEM_DISK'))->put("/customers/{$customer->id}/avatars/", $request->avatar, 'public');
            $customer->avatar = Storage::url($file);
            $customer->save();
        }

        return redirect()->route('dashboard.customers.show', $customer)->with('success', 'Customer successfully created.');
    }

    public function edit(Customer $customer)
    {
        return view('dashboard.customers.edit', [
            'customer' => $customer
        ]);
    }

    public function update(Customer $customer, UpdateCustomerRequest $request)
    {
        $customer->update([
            'address_1' => $request->address_1,
            'address_2' => ($request->address_2)?: null,
            'city' => $request->city,
            'state' => ($request->state)?: null,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
            'delivery_instructions' => $request->delivery_instructions,
            'notes' => $request->notes,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'allergies' => $request->allergies? json_encode(explode(",", $request->allergies)) : null,
            'charge_delivery' => ($request->charge_delivery)?: 0,
            'dob' => $request->dob,
        ]);

        if ($request->avatar) {
            $file = Storage::disk(env('FILESYSTEM_DISK'))->put("/customers/{$customer->id}/avatars/", $request->avatar, 'public');
            $customer->avatar = Storage::url($file);
            $customer->save();
        }

        return redirect()->route('dashboard.customers.show', $customer)->with('success', 'Customer successfully updated.');
    }

    public function destroy(Customer $customer)
    {

        if ($customer->orders->count() > 0) {
            return redirect()->route('dashboard.customer.show', $customer, 400)->with('error', 'Customer failed to delete.');
        }

        $customer->delete();

        return redirect()->route('dashboard.customers.index')->with('success', 'Customer successfully deleted.');
    }

}
