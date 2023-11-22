<?php

namespace App\Persistence\Repository;

use App\Entity\Product;

interface ProductRepository
{
    public function save(Product $product): Product;

    public function findById(int $id): ?Product;

}
