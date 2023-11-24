<?php

namespace App\Service\Uploads;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Contracts\Service\ServiceSubscriberInterface;
use Psr\Container\ContainerInterface;

class UploadHandler implements ServiceSubscriberInterface
{
    public function __construct(private ContainerInterface $container)
    {
    }

    public static function getSubscribedServices(): array
    {
        return [
            'csv' => CsvFileImport::class,
            'json' => JsonFileImport::class,
            'xlsx' => ExcelFileImporter::class,
        ];
    }

    public function upload(File $file)
    {
       $extension= $file->guessExtension();
        if ($this->container->has($extension)) {
            $handler = $this->container->get($extension);

            return $handler->upload($file);
        }
    }
}