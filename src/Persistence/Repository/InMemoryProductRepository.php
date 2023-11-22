<?php

namespace App\Persistence\Repository;

use App\Entity\Product;

class InMemoryProductRepository implements ProductRepository
{
    protected array $products = [];

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
        // implement the logic using ReflectionClass
    }
}