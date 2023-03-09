<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  
    public function index()
    {
        $products = Product::all();
        return inertia('Catalogue/Index', compact('products'));
    }

    public function create()
    {
        return inertia('Catalogue/Create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        return inertia('Catalogue/Edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        $product->delete();
        request()->session()->flash('flash.banner', '¡Se ha eliminado correctamente!');
        request()->session()->flash('flash.bannerStyle', 'success'); 
        return redirect()->route('catalogue.index');
    }
}
