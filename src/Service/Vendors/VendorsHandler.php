<?php

namespace App\Service\Vendors;

use App\Entity\Product;

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
            foreach ($vendorProducts as $vendorProduct) {
                $products[] = [
                    'id' => $vendorProduct->getUid(),
                    'vendorId' => $vendorProduct->getId(),
                    'vendor' => $vendor->getName(),
                    'name' => $vendorProduct->getName(),
                    'description' => $vendorProduct->getDescription(),
                    'price' => $vendorProduct->getPrice()
                ];
            }
        }

        return $products;
    }
}