<?php

use PHPUnit\Framework\TestCase;
use SnowIO\Akeneo3DataModel\VariantAxisSet;

class VariantAxisSetTest extends TestCase
{
    /**
     * @test
     */
    public function shouldCreateAnObjectFromAValidArray()
    {
        $variantAxes = VariantAxisSet::fromJson($variantAxisAttributes = ['size', 'color', 'material']);
        self::assertEquals($variantAxisAttributes, $variantAxes->getAxes());
    }

    /**
     * @test
     * @expectedException \SnowIO\Akeneo3DataModel\Akeneo3DataException
     */
    public function shouldThrowAnErrorIfTheNumberOfAxesIsGreaterThanFive()
    {
        VariantAxisSet::fromJson($variantAxisAttributes = ['size', 'color', 'material', 'density', 'viscosity', 'width']);
    }
}