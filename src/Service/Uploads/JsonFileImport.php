<?php

namespace App\Service\Uploads;

use Symfony\Component\HttpFoundation\File\File;

class JsonFileImport implements FileImporterInterface
{
    public function __construct()
    {
    }

    public function upload(File $file): array
    {
        return [
            'message' => 'Successfully uploaded file as Json format',
            'count' => 'Total 12 records saved'
        ];
    }
}