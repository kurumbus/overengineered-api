<?php


namespace App\Repositories;


use App\Models\Product;

class ProductRepository
{
    public function index()
    {
        return Product::all();
    }

    public function getItem(int $id)
    {
        return Product::findOrFail($id);
    }

    public function store(array $data)
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data)
    {
        $product->update($data);

        return $product->fresh();
    }

    public function destroy($id)
    {
        return Product::destroy($id);
    }
}
