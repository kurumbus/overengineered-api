<?php


namespace App\Services;


use App\Repositories\ProductRepository;

class ProductService
{

    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function show($id)
    {
        return $this->repository->getItem($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update(int $id, array $data)
    {
        $item = $this->repository->getItem($id);
        return $this->repository->update($item, $data);
    }

    public function destroy(int $id)
    {
        return $this->repository->destroy($id);
    }

}
