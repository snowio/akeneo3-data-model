<?php

use PHPUnit\Framework\TestCase;
use SnowIO\Akeneo3DataModel\AssociationData;

class AssociationDataTest extends TestCase
{
    /** @test */
    public function shouldCreateAnObjectGivenAValidArray()
    {
        $associations = AssociationData::fromJson($this->getAssociationDataJson());
        self::assertEquals(["A", "B", "C"], $associations->groups());
        self::assertEquals(["D", "E", "F"], $associations->products());
        self::assertEquals(["A120002-BLUE"], $associations->productModels());
    }

    public function getAssociationDataJson()
    {
        return [
            "style_with" => [
                "groups" => [
                    "A", "B", "C"
                ],
                "products" => [
                    "D", "E", "F"
                ],
                "product_models" => [
                    "A120002-BLUE"
                ]
            ]
        ];
    }
}
