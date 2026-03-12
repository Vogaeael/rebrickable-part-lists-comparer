<?php

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Model;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Model\BrickStoreBSXPart;

class BrickStoreBSXPartTest extends TestCase
{
    public static function paramsAndResultsProvider(): array
    {
        return [
            [
                'params' => [
                    'itemTypeId1',
                    'itemId1',
                    'colorId1',
                    1,
                ],
                'results' => [
                    'itemTypeId' => 'itemTypeId1',
                    'itemId' => 'itemId1',
                    'colorId' => 'colorId1',
                    'quantity' => 1,
                    'key' => 't:itemTypeId1-i:itemId1-c:colorId1',
                ],
            ],
            [
                'params' => [
                    'itemTypeId2',
                    'itemId2',
                    'colorId2',
                    2,
                ],
                'results' => [
                    'itemTypeId' => 'itemTypeId2',
                    'itemId' => 'itemId2',
                    'colorId' => 'colorId2',
                    'quantity' => 2,
                    'key' => 't:itemTypeId2-i:itemId2-c:colorId2',
                ],
            ],
            [
                'params' => [
                    'itemTypeId3',
                    'itemId3',
                    'colorId3',
                    3,
                ],
                'results' => [
                    'itemTypeId' => 'itemTypeId3',
                    'itemId' => 'itemId3',
                    'colorId' => 'colorId3',
                    'quantity' => 3,
                    'key' => 't:itemTypeId3-i:itemId3-c:colorId3',
                ],
            ],
        ];
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetQuantity(array $params, array $results): void
    {
        $part = new BrickStoreBSXPart(...$params);

        $this->assertSame($results['quantity'], $part->quantity);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetQuantity(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new BrickStoreBSXPart(...$params);

        $part->quantity = 1;
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetItemType(array $params, array $results): void
    {
        $part = new BrickStoreBSXPart(...$params);

        $this->assertSame($results['itemTypeId'], $part->itemTypeId);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetItemType(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new BrickStoreBSXPart(...$params);

        $part->itemTypeId = 'test';
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetItemId(array $params, array $results): void
    {
        $part = new BrickStoreBSXPart(...$params);

        $this->assertSame($results['itemId'], $part->itemId);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetItemId(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new BrickStoreBSXPart(...$params);

        $part->itemId = 'test';
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetColorId(array $params, array $results): void
    {
        $part = new BrickStoreBSXPart(...$params);

        $this->assertSame($results['colorId'], $part->colorId);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetColorId(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new BrickStoreBSXPart(...$params);

        $part->colorId = 'test';
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGenerateKey(array $params, array $results): void
    {
        $part = new BrickStoreBSXPart(...$params);

        $this->assertSame($results['key'], $part->generateKey());
    }
}