<?php

namespace App\Service;

use App\Entity\Product;
use App\Persistence\Repository\ProductRepository;

class CreateProductService
{

    public function __construct(
        protected ProductRepository $inMemoryProductRepository,
        protected NewProductCreatedNotification $productCreatedNotification
    ) {
    }

    public function save(array $data)
    {
        $product = new Product(id: null, name: $data['name'], price: $data['price'], status: 'created');
        $this->inMemoryProductRepository->save($product);
        $this->productCreatedNotification->send($product);

        return $product;
    }
}