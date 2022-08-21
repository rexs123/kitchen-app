<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
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
            'customers' => Customer::paginate(20)
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
            'address' => json_decode($request->address),
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'allergies' => json_decode($request->allergies),
            'charge_delivery' => $request->charge_delivery,
            'dob' => ($request->dob)?: null
        ]);

        if ($request->avatar) {
           Storage::disk(env('FILESYSTEM_DISK'))->put("/customers/{$customer->id}/avatars/", $request->avatar);
            $customer->avatar = Storage::url("/customers/{$customer->id}/avatars/");
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
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'allergies' => $request->allergies,
            'charge_delivery' => $request->charge_delivery,
            'avatar' => $request->avatar,
            'dob' => $request->dob,
        ]);

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
