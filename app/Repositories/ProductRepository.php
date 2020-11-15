<?php


namespace App\Repositories;


use App\Models\Product;
use Illuminate\Support\Facades\Cache as Cache;

class ProductRepository
{
    public function index()
    {
        return Cache::tags(['api-requests'])
            ->remember('products.index', 3600, function ()
            {
                return Product::all();
            });
    }

    public function getItem($id)
    {
        return Cache::tags(['api-requests'])
            ->remember('products.'.$id, 3600, function () use ($id)
            {
                return Product::findOrFail($id);
            });
    }

    public function store(array $data)
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data)
    {
        Cache::forget('products.'.$product->id);
        $product->update($data);
        return $product->fresh();
    }

    public function destroy($id)
    {
        return Product::destroy($id);
    }
}
