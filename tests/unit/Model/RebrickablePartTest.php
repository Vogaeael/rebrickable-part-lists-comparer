<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Model;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart;

class RebrickablePartTest extends TestCase
{
    public static function paramsAndResultsProvider(): array
    {
        return [
            [
                'params' => [
                    'part1',
                    'color1',
                    11,
                    1,
                ],
                'results' => [
                    'part' => 'part1',
                    'color' => 'color1',
                    'spareQuantity' => 1,
                    'quantity' => 11,
                    'key' => 'p:part1-c:color1',
                ],
            ],
            [
                'params' => [
                    'part2',
                    'color2',
                    22,
                    2,
                ],
                'results' => [
                    'part' => 'part2',
                    'color' => 'color2',
                    'spareQuantity' => 2,
                    'quantity' => 22,
                    'key' => 'p:part2-c:color2',
                ],
            ],
            [
                'params' => [
                    'part3',
                    'color3',
                    33,
                    3,
                ],
                'results' => [
                    'part' => 'part3',
                    'color' => 'color3',
                    'spareQuantity' => 3,
                    'quantity' => 33,
                    'key' => 'p:part3-c:color3',
                ],
            ],
        ];
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetQuantity(array $params, array $results): void
    {
        $part = new RebrickablePart(...$params);

        $this->assertSame($results['quantity'], $part->quantity);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetQuantity(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new RebrickablePart(...$params);

        $part->quantity = 1;
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetPart(array $params, array $results): void
    {
        $part = new RebrickablePart(...$params);

        $this->assertSame($results['part'], $part->part);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetPart(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new RebrickablePart(...$params);

        $part->part = 'test';
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetColor(array $params, array $results): void
    {
        $part = new RebrickablePart(...$params);

        $this->assertSame($results['color'], $part->color);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetColor(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new RebrickablePart(...$params);

        $part->color = 'test';
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetSpareQuantity(array $params, array $results): void
    {
        $part = new RebrickablePart(...$params);

        $this->assertSame($results['spareQuantity'], $part->spareQuantity);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetSpareQuantity(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new RebrickablePart(...$params);

        $part->spareQuantity = 1;
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGenerateKey(array $params, array $results): void
    {
        $part = new RebrickablePart(...$params);

        $this->assertSame($results['key'], $part->generateKey());
    }
    
    public function testCombine(): void
    {
        $partA = new RebrickablePart('part1', 'color1', 5, 3);
        $partB = new RebrickablePart('part2', 'color2', 4, 1);

        $partA->combine($partB);

        $this->assertSame(9, $partA->quantity);
        $this->assertSame(4, $partA->spareQuantity);
    }
}
