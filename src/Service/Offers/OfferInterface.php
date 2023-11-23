<?php

namespace App\Service\Offers;

use App\Service\ProductResponse;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('offers')]
interface OfferInterface
{
    public function getName(): string;

    public function endAt(): \DateTimeImmutable;

    public function applyDiscount(ProductResponse $product): ProductResponse;


}