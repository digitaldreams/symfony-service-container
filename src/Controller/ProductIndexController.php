<?php

namespace App\Controller;

use App\Service\Vendors\VendorsHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductIndexController
{
    public function __construct(protected VendorsHandler $vendorsHandler)
    {
    }
    #[Route('/products')]
    public function index(Request $request)
    {
        $products = $this->vendorsHandler->getAll($request->get('perPage', 10), $request->get('page', 1));

        return new JsonResponse([
            'data' => $products,
            'pagination' => [
                'perPage' => $request->get('perPage', 10),
                'page' => $request->get('page', 1)
            ]
        ]);
    }
}