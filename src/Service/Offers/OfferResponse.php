<?php

namespace App\Service\Offers;

class OfferResponse
{
    public function __construct(
        public readonly string $name,
        public readonly int $discountPercentage,
        public readonly float $totalDiscount,
        public readonly float $currentPrice
    ) {
    }
}