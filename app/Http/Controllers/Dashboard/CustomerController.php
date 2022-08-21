<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('dashboard.customers.index', [
            'customers' => Customer::all()->paginate(20)
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
        $customer = Customer::create([]);

        return redirect()->route('dashboard.customer.show', $customer)->with('success', 'Customer successfully created.');
    }

    public function edit(Customer $customer)
    {
        return view('dashboard.customers.edit', [
            'customer' => $customer
        ]);
    }

    public function update(Customer $customer, UpdateCustomerRequest $request)
    {
        return redirect()->route('dashboard.customer.show', $customer)->with('success', 'Customer successfully updated.');
    }

    public function destroy(Customer $customer)
    {

        if ($customer->orders->count() > 0) {
            return redirect()->route('dashboard.customer.show', $customer, 400)->with('error', 'Customer failed to delete.');
        }

        $customer->delete();

        return redirect()->route('dashboard.customer.index')->with('success', 'Customer successfully deleted.');
    }

}
