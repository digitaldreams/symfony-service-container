<?php

namespace App\Service\Uploads;

use Symfony\Component\HttpFoundation\File\File;

interface FileImporterInterface
{
    public function upload(File $file): array;
}