<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::get();
    }

    public function store(Request $request)
    {
        return Product::create($request->all());
    }

    public function show(Product $product)
    {
        return $product;
    }


    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return $product;
    }


    public function destroy(Product $product)
    {
        return $product->delete();
    }
}
