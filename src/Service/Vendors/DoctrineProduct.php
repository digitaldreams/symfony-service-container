<?php

namespace App\Service\Vendors;

use App\Persistence\Repository\DoctrineProductRepository;

class DoctrineProduct implements VendorInterface
{
    public function __construct(private DoctrineProductRepository $repository)
    {
    }

    public function getAll(int $limit = 10, int $page = 1)
    {
        // TODO: Implement getAll() method.
    }
}