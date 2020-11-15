<?php


namespace App\Repositories;


interface ProductRepository
{

    public function index();
    public function getItem($id);

}
