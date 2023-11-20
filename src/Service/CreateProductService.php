<?php

namespace App\Service;

use App\Entity\Product;
use App\Persistence\Repository\ProductRepository;

class CreateProductService
{
    protected ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function save(array $data)
    {
        $product = new Product(id: null, name: $data['name'], price: $data['price'], status: 'created');
        $this->repository->save($product);

        return $product;
    }
}