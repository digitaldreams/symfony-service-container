<?php

namespace App\Service\Offers;

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

    public function applyDiscount()
    {
        // TODO: Implement applyDiscount() method.
    }
}