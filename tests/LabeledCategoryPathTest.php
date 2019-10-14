<?php

use PHPUnit\Framework\TestCase;
use SnowIO\Akeneo3DataModel\LabeledCategoryPath;

class LabeledCategoryPathTest extends TestCase
{
    /** @test */
    public function shouldReturnTheLastLabelAsTheCategoryLabel()
    {
        $labeledCategoryPath = LabeledCategoryPath::fromJson(["A", "B", "C"]);
        self::assertEquals("C", $labeledCategoryPath->getCategoryLabel());
    }

    /** @test */
    public function shouldReturnTheFirstLabelAsTheRootCategoryLabel()
    {
        $labeledCategoryPath = LabeledCategoryPath::fromJson(["A", "B", "C"]);
        self::assertEquals("A", $labeledCategoryPath->getRootCategoryLabel());
    }

    /** @test */
    public function shouldReturnTheLastButOneAsTheParentCategoryLabel()
    {
        $labeledCategoryPath = LabeledCategoryPath::fromJson(["A", "B", "C"]);
        self::assertEquals("B", $labeledCategoryPath->getParentCategoryLabel());
    }

    /** @test */
    public function shouldReturnTheLevelAsTheNumberOfLabelsInTheLabeledCategoryPath()
    {
        $labeledCategoryPath = LabeledCategoryPath::fromJson(["A", "B", "C"]);
        self::assertEquals(3, $labeledCategoryPath->getLevel());
    }

    /** @test */
    public function shouldCheckTheContentsOfThePathCorrectly()
    {
        $labeledCategoryPath = LabeledCategoryPath::fromJson(["A", "B", "C"]);
        self::assertTrue($labeledCategoryPath->contains("A"));
        self::assertTrue($labeledCategoryPath->contains("B"));
        self::assertFalse($labeledCategoryPath->contains("E"));
    }

    /** @test */
    public function shouldCheckEqualityCorrectly()
    {
        $labeledCategoryPath = LabeledCategoryPath::fromJson(["A", "B", "C"]);
        self::assertTrue($labeledCategoryPath->equals(
            LabeledCategoryPath::fromJson(["A", "B", "C"])
        ));

        self::assertFalse(
            $labeledCategoryPath->equals(
                LabeledCategoryPath::fromJson(["A", "C", "B"])
            )
        );
    }

    /** @test */
    public function shouldHaveACorrectArrayRepresentation()
    {
        $labeledCategoryPath = LabeledCategoryPath::fromJson($input = ["A", "B", "C"]);
        self::assertEquals($input, $labeledCategoryPath->toArray());
    }
}