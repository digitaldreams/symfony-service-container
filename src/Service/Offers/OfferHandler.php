<?php

namespace App\Service\Offers;

use App\Service\Vendors\VendorsHandler;

class OfferHandler
{
    public function __construct(
        protected VendorsHandler $vendorsHandler,
        /**
         * @var OfferInterface[] $offers
         */
        protected iterable $offers
    ) {
    }

    public function getAll(int $limit = 10, $page = 1): array
    {
        $products = $this->vendorsHandler->getAll($limit, $page);
        foreach ($this->offers as $offer) {
            if ($offer->endAt() >= new \DateTimeImmutable()) {
                $products = array_map(fn($product) => $offer->applyDiscount($product), $products);
            }
        }

        return $products;
    }

}