<?php

namespace App\Service\Vendors;

use App\Persistence\Repository\InMemoryProductRepository;

class InMemoryProduct implements VendorInterface
{
    public function __construct(private InMemoryProductRepository $repository)
    {
    }

    public function getAll(int $limit = 10, int $page = 1)
    {
        return $this->repository->getAll($limit, $page);
    }

    public function getName(): string
    {
        return 'inMemory';
    }
}