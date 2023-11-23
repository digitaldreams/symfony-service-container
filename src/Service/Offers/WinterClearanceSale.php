<?php

namespace App\Service\Offers;

use App\Service\ProductResponse;

class WinterClearanceSale implements OfferInterface
{

    public function getName(): string
    {
        return 'winter-clearance-sale-2023';
    }

    public function endAt(): \DateTimeImmutable
    {
        return new \DateTimeImmutable('2023-12-01 00:00:00');
    }

    public function applyDiscount(ProductResponse $product): ProductResponse
    {

        if (in_array($product->vendor, ['inMemory', 'database']) && !$product->hasOffer()) {

            $product->setOffer($this->calculateOffer($product));
        }

        return $product;
    }

    private function calculateOffer(ProductResponse $product)
    {
        $discountAmount = ($product->price * 10) / 100;
        return new OfferResponse($this->getName(), 10, $discountAmount, $product->price - $discountAmount);
    }
}