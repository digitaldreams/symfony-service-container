<?php

namespace App\Service\Vendors;

use App\Entity\Product;
use Symfony\Component\Uid\Uuid;

class Ebay implements VendorInterface
{

    public function getAll(int $limit = 10, int $page = 1)
    {
        return [
            new Product(
                id: 2,
                uid: Uuid::v7()->toRfc4122(),
                name: 'Dell Latitude Laptop Battery',
                description: '6 Cell 600w, 22 hours power backup',
                vendor: 'ebay',
                price: 250
            )
        ];
    }

    public function getName(): string
    {
        return 'ebay';
    }
}