<?php

namespace App\Service;

use App\Entity\Product;
use App\Service\Offers\OfferResponse;

class ProductResponse
{
    public ?OfferResponse $offer = null;

    public function __construct(
        public readonly int $vendorId,
        public readonly string $uid,
        public readonly string $name,
        public readonly ?string $description,
        public readonly string $price,
        public readonly string $vendor,
    ) {
    }

    public static function create(Product $product): static
    {
        return new static(
            vendorId: $product->getId(),
            uid: $product->getUid(),
            name: $product->getName(),
            description: $product->getDescription(),
            price: $product->getPrice(),
            vendor: $product->getVendor()
        );
    }

    public function hasOffer(): bool
    {
        return !is_null($this->offer);
    }

    public function setOffer(OfferResponse $offer)
    {
        $this->offer = $offer;

        return $this;
    }
}