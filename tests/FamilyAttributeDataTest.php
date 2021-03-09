<?php

use PHPUnit\Framework\TestCase;
use SnowIO\Akeneo3DataModel\FamilyAttributeData;
use SnowIO\Akeneo3DataModel\InternationalizedString;

class FamilyAttributeDataTest extends TestCase
{

    public function testFromJson()
    {
        $labels = ["en_GB" => "Diameter", "es_ES" => "Diametro"];
        $attribute = FamilyAttributeData::fromJson(
            [
                "code" => "Diameter",
                "is_required" => [
                    "ecommerce" => true,
                ],
                "group" => "default",
                "sort_order" => 10,
            ]
        );

        self::assertEquals("diameter", $attribute->getCode());
        self::assertEquals(true, $attribute->isRequired("ecommerce"));
        self::assertEquals(10, $attribute->getSortOrder());
    }

}
