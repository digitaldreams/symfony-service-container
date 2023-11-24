<?php

namespace App\Service\Uploads;

use Symfony\Component\HttpFoundation\File\File;

class ExcelFileImporter implements FileImporterInterface
{
    public function __construct()
    {
    }

    public function upload(File $file): array
    {
        return [
            'message' => 'Successfully uploaded file as Excel format',
            'count' => 'Total 100 records saved'
        ];
    }
}