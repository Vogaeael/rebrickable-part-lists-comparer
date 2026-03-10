<?php

namespace Vogaeael\tests\Helper;

use Exception;
use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\LegoPickABrickPart;
use Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart;

final class CheckClassTest extends TestCase
{
    public function testCheckClass(): void
    {
        $this->expectNotToPerformAssertions();
        $part = new LegoPickABrickPart('elementId', 0);
        $checkClass = new CheckClass();
        try {
            $checkClass->checkClass($part, LegoPickABrickPart::class);
        } catch (Exception $exception) {
            $this->fail(sprintf('Exception not expected: %s', $exception->getMessage()));
        }
    }

    public function testCompareClassWithException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Part with key `elementId` is not of class Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart');
        $part = new LegoPickABrickPart('elementId', 0);
        $checkClass = new CheckClass();
        $checkClass->checkClass($part, RebrickablePart::class);
    }
}
