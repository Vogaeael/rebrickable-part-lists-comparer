<?php declare(strict_types=1);

namespace Vogaeael\tests\Model;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;

class BrickLinkPartTest extends TestCase
{
    public static function additionProvider(): array
    {
        return [
            [
                'params' => [
                    'itemType1',
                    'itemId1',
                    'colorId1',
                    1,
                ],
                'results' => [
                    'itemType' => 'itemType1',
                    'itemId' => 'itemId1',
                    'colorId' => 'colorId1',
                    'quantity' => 1,
                    'key' => 't:itemType1-i:itemId1-c:colorId1',
                ],
            ],
            [
                'params' => [
                    'itemType2',
                    'itemId2',
                    'colorId2',
                    2,
                ],
                'results' => [
                    'itemType' => 'itemType2',
                    'itemId' => 'itemId2',
                    'colorId' => 'colorId2',
                    'quantity' => 2,
                    'key' => 't:itemType2-i:itemId2-c:colorId2',
                ],
            ],
            [
                'params' => [
                    'itemType3',
                    'itemId3',
                    'colorId3',
                    3,
                ],
                'results' => [
                    'itemType' => 'itemType3',
                    'itemId' => 'itemId3',
                    'colorId' => 'colorId3',
                    'quantity' => 3,
                    'key' => 't:itemType3-i:itemId3-c:colorId3',
                ],
            ],
        ];
    }

    #[DataProvider('additionProvider')]
    public function testGetQuantity(array $params, array $results): void
    {
        $part = new BrickLinkPart(...$params);

        $this->assertSame($results['quantity'], $part->quantity);
    }

    #[DataProvider('additionProvider')]
    public function testSetQuantity(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new BrickLinkPart(...$params);

        $part->quantity = 1;
    }

    #[DataProvider('additionProvider')]
    public function testGetItemType(array $params, array $results): void
    {
        $part = new BrickLinkPart(...$params);

        $this->assertSame($results['itemType'], $part->itemType);
    }

    #[DataProvider('additionProvider')]
    public function testSetItemType(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new BrickLinkPart(...$params);

        $part->itemType = 'test';
    }

    #[DataProvider('additionProvider')]
    public function testGetItemId(array $params, array $results): void
    {
        $part = new BrickLinkPart(...$params);

        $this->assertSame($results['itemId'], $part->itemId);
    }

    #[DataProvider('additionProvider')]
    public function testSetItemId(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new BrickLinkPart(...$params);

        $part->itemId = 'test';
    }

    #[DataProvider('additionProvider')]
    public function testGetColorId(array $params, array $results): void
    {
        $part = new BrickLinkPart(...$params);

        $this->assertSame($results['colorId'], $part->colorId);
    }

    #[DataProvider('additionProvider')]
    public function testSetColorId(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new BrickLinkPart(...$params);

        $part->colorId = 'test';
    }

    #[DataProvider('additionProvider')]
    public function testGenerateKey(array $params, array $results): void
    {
        $part = new BrickLinkPart(...$params);

        $this->assertSame($results['key'], $part->generateKey());
    }
}
