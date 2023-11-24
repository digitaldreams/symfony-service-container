<?php

namespace App\Controller;

use App\Service\Uploads\UploadHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductUploadController
{
    public function __construct(private UploadHandler $uploadHandler)
    {
    }

    #[Route('product/upload', methods: ['POST'])]
    public function upload(Request $request)
    {
        if ($request->files->has('file')) {
            return new JsonResponse($this->uploadHandler->upload($request->files->get('file')));
        }

        return new JsonResponse(['message' => 'Invalid File or no file uploaded'], 422);
    }
}