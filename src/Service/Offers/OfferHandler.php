<?php

namespace App\Service\Offers;

use App\Service\Vendors\VendorsHandler;

class OfferHandler
{
    public function __construct(
        protected VendorsHandler $vendorsHandler,
        protected iterable $offers
    ) {
    }

    public function getAll(int $limit = 10, $page = 1): array
    {
        return $this->vendorsHandler->getAll($limit, $page);
    }

}