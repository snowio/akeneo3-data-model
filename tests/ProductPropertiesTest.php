<?php

use PHPUnit\Framework\TestCase;
use SnowIO\Akeneo3DataModel\ProductProperties;

class ProductPropertiesTest extends TestCase
{

    /** @test */
    public function shouldCreateObjectsArray()
    {
        $productProperties = ProductProperties::fromJson(self::getProductPropertiesAsJson());
        self::assertNotNull($productProperties->getCategories());
        self::assertEquals(true, $productProperties->getEnabled());
        self::assertNotNull($productProperties->getCategoryLabels("en_GB"));
        self::assertEquals(["socks"], $productProperties->getGroups());
        self::assertEquals("main", $productProperties->getFamily());
        self::assertEquals("pm1234", $productProperties->getParent());
    }

    public function getProductPropertiesAsJson()
    {
        return [
            "sku" => "socks_1",
            "categories" => [["men's socks", "woolen"], ["men's attire", "footwear"]],
            "enabled" => 1,
            "family" => "main",
            "groups" => ["socks"],
            "parent" => "pm1234",
            'localizations' => [
                'en_GB' => [
                    "category_labels" => [
                        [
                            "Test Categories"
                        ]
                    ]
                ],

            ],
        ];
    }
}