<?php

namespace App\Service\Offers;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('offers')]
interface OfferInterface
{
    public function getName(): string;

    public function endAt(): \DateTimeImmutable;

    public function applyDiscount();


}