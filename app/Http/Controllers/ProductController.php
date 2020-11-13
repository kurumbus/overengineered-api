<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        try {
            return Product::get();
        } catch (Exception $e) {
            $this->respondError($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        return Product::create($request->all());
    }

    public function show(Product $product)
    {
        try {
            return $product;
        } catch (Exception $e) {
            $this->respondError($e->getMessage());
        }
    }

    public function update(Request $request, Product $product)
    {
        try {
            $product->update($request->all());
            return $product;
        } catch (Exception $e) {
            $this->respondError($e->getMessage());
        }

    }


    public function destroy(Product $product)
    {
        try {
            return $product->delete();
        } catch (Exception $e) {
            $this->respondError($e->getMessage());
        }
    }
}
