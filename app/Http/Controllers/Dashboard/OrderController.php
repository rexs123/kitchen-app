<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('dashboard.orders.index', [
            'orders' => Order::with(['customer', 'products'])->paginate(20),
        ]);
    }

    public function show(Order $order)
    {
        return view('dashboard.orders.show', $order);
    }

    public function create()
    {
        return view('dashboard.orders.create', [
            'products' => Product::all(),
            'customers' => Customer::all(),
        ]);
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'created_by' => $request->user()->id,
            'status' => $request->status,
            'total_products' => 0,
            'total_price' => 0,
            'taxes' => 0,
            'completed_at' => ($request->completed_at)?: null,
        ]);

        // todo: emit event  to update total product count and price summaries.
        foreach ($request->products as $product) {
            $order->products()->attach($product->id);
        }

        $order->total_products = $order->products()->count();
        $order->total_price = $order->products->pluck('price')->sum();
        $order->save();

        // todo: emit event to update taxes.

        return redirect()->route('dashboard.orders.show', $order)->with('success', 'Order successfully created and assigned to customer.');
    }

    public function edit(Order $order)
    {
        return view('dashboard.orders.show', [
           'order' => $order
        ]);
    }

    public function update(Order $order, UpdateOrderRequest $request)
    {
        // update variable fields provided in form request

        return redirect()->route('dashboard.orders.show', $order)->with('success', 'Order successfully updated.');
    }

    public function destroy(Order $order, UpdateOrderRequest $request)
    {
        if ($order->status !== 'unpaid') {
            return redirect()->route('dashboard.orders.index')->with('error', 'Order successfully has been paid and therefore cannot be deleted.');
        }

        $order->delete();

        return redirect()->route('dashboard.orders.index')->with('success', 'Order successfully updated.');
    }

}
