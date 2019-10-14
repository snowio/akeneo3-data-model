<?php

use PHPUnit\Framework\TestCase;
use SnowIO\Akeneo3DataModel\LabeledCategoryPath;
use SnowIO\Akeneo3DataModel\LabeledCategoryPathSet;

class LabeledCategoryPathSetTest extends TestCase
{
    /** @test */
    public function shouldCreateAnObjectFromAnArray()
    {
        $categoryPathSet = LabeledCategoryPathSet::fromJson($this->getData());
        /**
         * @var int $index
         * @var LabeledCategoryPath $categoryPath
         */
        foreach ($categoryPathSet as $index => $categoryPath) {
            self::assertEquals($this->getData()[$index]["category_labels"], $categoryPath->toArray());
        }
    }

    private function getData()
    {
        return [
            "en_GB" => [
                "category_labels" => [
                    "Root",
                    "Clothing",
                    "Blouses"
                ]
            ],
            "de_DE" => [
                "category_labels" => [
                    "Root",
                    "Clothing",
                    "Blouses"
                ]
            ],
        ];
    }
}