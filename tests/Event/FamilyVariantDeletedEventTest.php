<?php

use PHPUnit\Framework\TestCase;
use SnowIO\Akeneo3DataModel\Event\FamilyVariantDeletedEvent;

class FamilyVariantDeletedEventTest extends TestCase
{
    /** @test */
    public function shouldCreateAnObjectFromAnArray()
    {
        $familyVariantDeletedEvent = FamilyVariantDeletedEvent::fromJson(FamilyVariantDataTest::getFamilyVariantData());
        self::assertEquals("test", $familyVariantDeletedEvent->getFamilyVariantCode());
        self::assertNotNull($familyVariantDeletedEvent->getPreviousFamilyVariant());
    }
}