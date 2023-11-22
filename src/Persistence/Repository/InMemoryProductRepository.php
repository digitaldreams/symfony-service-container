<?php

namespace App\Persistence\Repository;

use App\Entity\Product;
use Symfony\Component\Uid\Uuid;

class InMemoryProductRepository implements ProductRepository
{
    protected array $products = [
    ];

    public function __construct()
    {
        $this->products = [
            new Product(
                id: 1,
                uid: Uuid::v7()->toRfc4122(),
                name: 'Xtreme Boy',
                description: 'Traveler Durable backpack',
                vendor: 'inMemory',
                price: 1520,
                status: 'active'
            )
        ];
    }

    public function save(Product $product): Product
    {
        $this->setIdIfNull($product);
        $this->products[$product->getId()] = $product;

        return $product;
    }

    public function findById(int $id): ?Product
    {
        return $this->products[$id] ?? null;
    }

    private function setIdIfNull(&$product)
    {
        $reflectionProperty = new \ReflectionProperty($product, 'id');
        $reflectionProperty->setValue($product, count($this->products) + 1);

        return $product;
    }
}