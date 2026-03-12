<?php

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Model;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Model\LegoPickABrickPart;

class LegoPickABrickPartTest extends TestCase
{
    public static function paramsAndResultsProvider(): array
    {
        return [
            [
                'params' => [
                    'elementId1',
                    1,
                ],
                'results' => [
                    'elementId' => 'elementId1',
                    'quantity' => 1,
                    'key' => 'elementId1',
                ],
            ],
            [
                'params' => [
                    'elementId2',
                    2,
                ],
                'results' => [
                    'elementId' => 'elementId2',
                    'quantity' => 2,
                    'key' => 'elementId2',
                ],
            ],
            [
                'params' => [
                    'elementId3',
                    3,
                ],
                'results' => [
                    'elementId' => 'elementId3',
                    'quantity' => 3,
                    'key' => 'elementId3',
                ],
            ],
        ];
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetQuantity(array $params, array $results): void
    {
        $part = new LegoPickABrickPart(...$params);

        $this->assertSame($results['quantity'], $part->quantity);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetQuantity(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new LegoPickABrickPart(...$params);

        $part->quantity = 1;
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetElementId(array $params, array $results): void
    {
        $part = new LegoPickABrickPart(...$params);

        $this->assertSame($results['elementId'], $part->elementId);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetElementId(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new LegoPickABrickPart(...$params);

        $part->elementId = 'test';
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGenerateKey(array $params, array $results): void
    {
        $part = new LegoPickABrickPart(...$params);

        $this->assertSame($results['key'], $part->generateKey());
    }
}