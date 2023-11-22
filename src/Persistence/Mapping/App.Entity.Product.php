<?php

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use Doctrine\ORM\Mapping\ClassMetadataInfo;

/**
 * @var ClassMetadata $metadata
 */
$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(['name' => 'product_products']);
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);

//Fields
$metadata->mapField([
    'id' => true,
    'fieldName' => 'id',
    'type' => 'integer',
    'columnName' => 'id',
]);

$metadata->mapField([
    'fieldName' => 'uid',
    'type' => 'string',
    'columnName' => 'uid',
]);

$metadata->mapField([
    'fieldName' => 'name',
    'type' => 'string',
    'length' => 150,
    'nullable' => false,
    'columnName' => 'name',
]);

$metadata->mapField([
    'fieldName' => 'price',
    'type' => 'float',
    'nullable' => false,
    'columnName' => 'price',
]);

$metadata->mapField([
    'fieldName' => 'status',
    'type' => 'string',
    'nullable' => false,
    'columnName' => 'status',
]);

$metadata->mapField([
    'fieldName' => 'vendor',
    'type' => 'string',
    'nullable' => false,
    'columnName' => 'vendor',
]);
$metadata->mapField([
    'fieldName' => 'description',
    'type' => 'text',
    'nullable' => true,
    'columnName' => 'description',
]);

$metadata->mapField([
    'fieldName' => 'createdAt',
    'type' => 'datetime_immutable',
    'nullable' => false,
    'columnName' => 'created_at',
]);

$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);