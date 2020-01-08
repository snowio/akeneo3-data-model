<?php
declare(strict_types=1);
namespace SnowIO\Akeneo3DataModel;

final class AssociationData
{
    public static function fromJson(array $json): self
    {
        $association = new self;
        $code = array_keys($json)[0] ?? null;
        if (!$code) {
            throw new Akeneo3DataException('Invalid association: no association code provided');
        }

        $association->code = $code;
        $association->groups = $json[$code]["groups"];
        $association->products = $json[$code]["products"];
        $association->productModels = $json[$code]["product_models"];
        return $association;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function groups(): array
    {
        return $this->groups;
    }

    public function products(): array
    {
        return $this->products;
    }

    public function productModels(): array
    {
        return $this->productModels;
    }

    public function equals($other)
    {
        return $other instanceof self &&
            $other->groups == $this->groups &&
            $other->productModels == $this->productModels &&
            $other->products == $this->products;
    }

    private $code;
    private $groups = [];
    private $products = [];
    private $productModels = [];

    private function __construct()
    {
    }
}
