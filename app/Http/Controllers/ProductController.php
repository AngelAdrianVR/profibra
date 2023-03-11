<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  
    public function index()
    {
        $products = Product::all();
        $product_types = ProductType::all();
        // return $products;
        return inertia('Catalogue/Index', compact('products', 'product_types'));
    }

    public function create()
    {   
        $product_types = ProductType::All();
        return inertia('Catalogue/Create', compact('product_types'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'cost' => 'required|numeric|min:1',
            'presentation' => 'required|max:50',
            'product_type_id' => 'required',
            'max_quantity' => 'required|numeric',
            'min_quantity' => 'required|numeric',
            'supply_point' => 'required|numeric',
        ]);

        $new_product = Product::create($validated);

        Inventory::create([
            'quantity' => $request->initial_inventory,
            'last_count_date' => now(),
            'product_id' => $new_product->id,
        ]);

        request()->session()->flash('flash.banner', 'Se agregó el producto correctamente');
        request()->session()->flash('flash.bannerStyle', 'success'); 
        return redirect()->route('catalogue.index');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        $product_types = ProductType::All();
        // return $product;
        return inertia('Catalogue/Edit', compact('product', 'product_types'));
    }


    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'cost' => 'required|numeric|min:1',
            'presentation' => 'required|max:50',
            'product_type_id' => 'required',
            'max_quantity' => 'required|numeric',
            'min_quantity' => 'required|numeric',
            'supply_point' => 'required|numeric',
        ]);

        $product->update($validated);

        // $product_inventory = Inventory::find($product);
        // $product_inventory->update([
        //     'quantity' => $request->initial_inventory,
        //     'last_count_date' => now(), 
        // ]);

        request()->session()->flash('flash.banner', 'Se actualizó el producto correctamente');
        request()->session()->flash('flash.bannerStyle', 'success'); 
        return redirect()->route('catalogue.index');
    }


    public function destroy(Request $request)
    {
        Product::whereIn('id', $request->selections)->delete();
    }
}
