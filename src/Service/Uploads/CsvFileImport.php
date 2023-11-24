<?php

namespace App\Service\Uploads;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\File\File;

class CsvFileImport implements FileImporterInterface
{
    public function __construct(protected LoggerInterface $logger)
    {
    }

    public function upload(File $file): array
    {
        $this->logger->alert(sprintf('CSV: %s file imported',$file->getFilename()));
        return [
            'message' => 'Successfully uploaded file as CSV format',
            'count' => 'Total 22 records saved'
        ];
    }
}