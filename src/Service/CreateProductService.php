<?php

namespace App\Service;

use App\Entity\Product;
use App\Persistence\Repository\ProductRepository;
use Symfony\Component\Uid\Uuid;

class CreateProductService
{

    public function __construct(
        protected ProductRepository $repository,
        protected NewProductCreatedNotification $productCreatedNotification
    ) {
    }

    public function save(array $data)
    {
        $product = new Product(id: null,uid: Uuid::v7()->toRfc4122() , name: $data['name'], price: $data['price'], status: 'created');
        $this->repository->save($product);
        $this->productCreatedNotification->send($product);

        return $product;
    }
}