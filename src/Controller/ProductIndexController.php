<?php

namespace App\Controller;

use App\Service\Vendors\VendorsHandler;
use App\Service\Offers\OfferHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductIndexController
{
    public function __construct(protected  $vendorsHandler)
    {
    }
    #[Route('/products')]
    public function index(Request $request)
    {
      //  print_r(get_class($this->vendorsHandler));
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