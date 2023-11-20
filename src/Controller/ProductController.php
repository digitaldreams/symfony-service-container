<?php

namespace App\Controller;

use App\Service\CreateProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController
{
    protected CreateProductService $createProduct;

    public function __construct(CreateProductService $createProduct)
    {
        $this->createProduct = $createProduct;
    }

    #[Route('/product/create')]
    public function create(Request $request)
    {
        $product = $this->createProduct->save(['name' => $request->get('name'), 'price' => $request->get('price')]);
        return new JsonResponse([
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice()
        ]);
    }
}