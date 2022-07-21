<?php

use PHPUnit\Framework\TestCase;
use SnowIO\Akeneo3DataModel\AttributeData;
use SnowIO\Akeneo3DataModel\InternationalizedString;

class AttributeDataTest extends TestCase
{

    public function testFromJson()
    {
        $labels = ["en_GB" => "Diameter", "es_ES" => "Diametro"];
        $attribute = AttributeData::fromJson(
            [
                "code" => "Diameter",
                "type" => "pim_catalog_identifier",
                "localizable" => 0,
                "scopable" => 1,
                "sort_order" => "10",
                "labels" => $labels,
                "group" => "default",
                "decimals_allowed" => 1,
            ]
        );

        self::assertEquals("diameter", $attribute->getCode());
        self::assertEquals("pim_catalog_identifier", $attribute->getType());
        self::assertTrue($attribute->getLabels()->equals(InternationalizedString::fromJson($labels)));
        self::assertEquals("10", $attribute->getSortOrder());
        self::assertTrue($attribute->isDecimalsAllowed());
    }

}
