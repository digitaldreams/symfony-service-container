<?php

namespace App\Service\Vendors;

interface VendorInterface
{
    public function getAll(int $limit = 10, int $page = 1);
}