<?php

namespace App\Service;

use App\Entity\Product;
use App\Repository\ProductRepository;

class CreateProductService
{
    protected ProductRepository $repository;
    public function __construct(ProductRepository $repository)
    {
        $this->repository=$repository;
    }

    public function save(array $data)
    {
        $product = new Product();
        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setCreatedAt(new \DateTimeImmutable());
        $this->repository->save($product);

        return $product;
    }
}