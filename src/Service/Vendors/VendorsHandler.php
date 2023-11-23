<?php

namespace App\Service\Vendors;

use App\Entity\Product;
use App\Service\ProductResponse;

class VendorsHandler
{
    /**
     * @param VendorInterface[] $vendors
     */
    public function __construct(protected iterable $vendors)
    {
    }

    /**
     * @return Product[]
     */
    public function getAll(int $limit = 10, $page = 1): array
    {
        $products = [];
        foreach ($this->vendors as $vendor) {
            $vendorProducts = $vendor->getAll($limit, $page);
            $products[]=array_map(fn($vendorProduct) => ProductResponse::create($vendorProduct), $vendorProducts) ;
        }

        return array_merge(...$products);
    }
}