<?php


namespace App\Repositories;


use App\Collections\ProductResourceCollection;
use App\Models\Product;
use App\Resources\ProductResource;
use Illuminate\Support\Facades\Cache as Cache;

class ProductRepository
{
    public function index()
    {
        return Cache::tags(['api-requests'])
            ->remember('products.index', 3600, function ()
            {
                return new ProductResourceCollection(Product::all());
            });
    }

    public function getItem($id)
    {
        return Cache::tags(['api-requests'])
            ->remember('products.'.$id, 3600, function () use ($id)
            {
                return new ProductResource(Product::findOrFail($id));
            });
    }

    public function store(array $data)
    {
        return  new ProductResource(Product::create($data));
    }

    public function update(Product $product, array $data)
    {
        Cache::forget('products.'.$product->id);
        $product->update($data);
        return  new ProductResource($product->fresh());
    }

    public function destroy($id)
    {
        return Product::destroy($id);
    }
}
