<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\directoryExists;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('dashboard.products.index', [
            'products' => Product::paginate(20)
        ]);
    }

    public function show(Product $product)
    {
        return view('dashboard.products.show', [
            'product' => $product
        ]);
    }

    public function create()
    {
        return view('dashboard.orders.create');
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'image' => '', // storage handling
            'description' => $request->description,
            'ingredients' => json_decode($request->ingredients),
            'allergens' => json_decode($request->ingredients),
            'price' => $request->price,
            'weight' => $request->weight,
            'cost_of_materials' => $request->cost_of_materials,
            'cost_of_ingredients' => $request->cost_of_ingredients,
        ]);

        return redirect()->route('dashboard.products.show', $product)->with('success', 'Product successfully created.');
    }

    public function edit(Product $product)
    {
        return view('dashboard.orders.edit', [
            'product' => $product
        ]);
    }


    public function update(Product $product, UpdateProductRequest $request)
    {
        //todo: validate if this belongs to any PAID orders; if so deny to update on price, and weight

        $product = $product->update([
            'name' => $request->name,
            'image' => '', // storage handling
            'description' => $request->description,
            'ingredients' => json_decode($request->ingredients),
            'allergens' => json_decode($request->ingredients),
            'price' => $request->price,
            'weight' => $request->weight,
            'cost_of_materials' => $request->cost_of_materials,
            'cost_of_ingredients' => $request->cost_of_ingredients,
        ]);

        return redirect()->route('dashboard.products.show', $product)->with('success', 'Product successfully updated.');
    }

    public function destroy(Product $product)
    {
        if ($product->orders()->count() > 0) {
            return redirect()->route('dashboard.products.index')->with('error', 'This product belongs to an order, and therefore cannot be deleted.');
        }

        $product->delete();

        return redirect()->route('dashboard.products.index')->with('success', 'This product belongs to an order, and therefore cannot be deleted.');
    }
}
