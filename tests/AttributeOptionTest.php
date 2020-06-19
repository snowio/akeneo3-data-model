<?php

use PHPUnit\Framework\TestCase;
use SnowIO\Akeneo3DataModel\AttributeOption;
use SnowIO\Akeneo3DataModel\InternationalizedString;

class AttributeOptionTest extends TestCase
{

    public function testFromJson()
    {
        $labels = ["en_GB" => "36C", "fr_FR" => "95C", "de_DE" => "80C", "en_AU" => "36C", "en_US" => "36B", "es_ES" => "80C"];
        $attributeOption = AttributeOption::fromJson(
            [
                "code" => "size-110",
                "attribute" => "size",
                "sort_order" => "67",
                "labels" => $labels
            ]
        );

        self::assertEquals("size-110", $attributeOption->getOptionCode());
        self::assertEquals("size", $attributeOption->getAttributeCode());
        self::assertTrue($attributeOption->getLabels()->equals(InternationalizedString::fromJson($labels)));
        self::assertEquals("67", $attributeOption->getSortOrder());
    }
}
