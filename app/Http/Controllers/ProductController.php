<?php

namespace App\Http\Controllers;

use App\Collections\ProductResourceCollection;
use App\Models\Product;
use App\Resources\ProductResource;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @var \App\Services\ProductService
     */
    private $service;

    public function __construct(ProductService $productService)
    {
        $this->service = $productService;
    }

    public function index()
    {
        try {
            return $this->service->index();
        } catch (Exception $e) {
            $this->respondError($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            return $this->service->store($request->all());
        } catch (Exception $e) {
            $this->respondError($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            return  new ProductResource($this->service->show($id));
        } catch (Exception $e) {
            $this->respondError($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->service->update($id, $request->all());
        } catch (Exception $e) {
            $this->respondError($e->getMessage());
        }

    }


    public function destroy($id)
    {
        try {
            return $this->service->destroy($id);
        } catch (Exception $e) {
            $this->respondError($e->getMessage());
        }
    }
}
