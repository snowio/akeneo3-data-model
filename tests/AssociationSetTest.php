<?php

use PHPUnit\Framework\TestCase;
use SnowIO\Akeneo3DataModel\AssociationData;
use SnowIO\Akeneo3DataModel\AssociationSet;

class AssociationSetTest extends TestCase
{
    /** @test */
    public function shouldCreateAnObjectFromAnArray()
    {
        $associationSetTest = AssociationSet::fromJson($this->getAssociationJson());

        self::assertTrue(
            AssociationData::fromJson([
                'style_with' => $this->getAssociationJson()["style_with"]
            ])->equals($associationSetTest->getAssociation("style_with"))
        );
        self::assertTrue(
            AssociationData::fromJson([
                'decorate_with' => $this->getAssociationJson()["decorate_with"]
            ])->equals($associationSetTest->getAssociation("decorate_with"))
        );
    }

    private function getAssociationJson()
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
            ],
            "decorate_with" => [
                "groups" => [
                    "A1", "B2", "C2"
                ],
                "products" => [
                    "D2", "E2", "F2"
                ],
                "product_models" => [
                    "A120002-BLUE"
                ]
            ]
        ];
    }
}
