<?php
declare(strict_types=1);
namespace SnowIO\Akeneo3DataModel;

class ProductModelData extends ItemData
{
    public static function fromJson(array $json): self
    {
        /** @var static $productModel */
        $productModel = parent::fromJson($json);
        $productModel->properties = ProductModelProperties::fromJson($json);
        $productModel->associations = AssociationSet::fromJson($json['associations'] ?? []);
        return $productModel;
    }

    public function getCode(): string
    {
        return $this->properties->getCode();
    }

    public function getProperties(): ProductModelProperties
    {
        return $this->properties;
    }

    public function getAssociations(): AssociationSet
    {
        return $this->associations;
    }

    public function equals(): bool
    {

    }


    /** @var ProductModelProperties */
    private $properties;
    /** @var AssociationSet */
    private $associations;
}
