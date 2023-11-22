<?php

namespace App\Service\Vendors;

use App\Entity\Product;
use Symfony\Component\Uid\Uuid;

class Amazon implements VendorInterface
{

    public function getAll(int $limit = 10, int $page = 1)
    {
        return [
            new Product(
                id: 1,
                uid: Uuid::v7()->toRfc4122(),
                name: 'MacBook Pro M3',
                description: '14 inch Macbook pro 256 GB SSD, 16 GB RAM',
                vendor: 'amazon',
                price: 3900
            )
        ];
    }

    public function getName(): string
    {
        return 'amazon';
    }
}