<?php


namespace App\Repositories;


use Illuminate\Support\Facades\Cache as Cache;
use Illuminate\Support\Facades\DB;

class ProductRepositoryRaw implements ProductRepository
{
    public function index()
    {
        return Cache::tags(['api-requests'])
            ->remember('products.index', 3600, function ()
            {
                return DB::table('products')->join("variations",function ($join) {
                    $join->on('products.id', '=', 'variations.product_id');
                })->get();
            });
    }

    public function getItem($id)
    {
        return Cache::tags(['api-requests'])
            ->remember('products.'.$id, 3600, function () use ($id)
            {
                return DB::table('products')->where('id', $id)->join("variations",function ($join) {
                    $join->on('products.id', '=', 'variations.product_id');
                })->get();
            });
    }
}
