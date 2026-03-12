<?php

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Model;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Model\LDCadPart;

final class LDCadPartTest extends TestCase
{
    public static function paramsAndResultsProvider(): array
    {
        return [
            [
                'params' => [
                    'identifier1',
                    'color1',
                    'sourceInv1',
                    1,
                ],
                'results' => [
                    'identifier' => 'identifier1',
                    'color' => 'color1',
                    'sourceInv' => 'sourceInv1',
                    'quantity' => 1,
                    'key' => 'i:identifier1-c:color1',
                ],
            ],
            [
                'params' => [
                    'identifier2',
                    'color2',
                    'sourceInv2',
                    2,
                ],
                'results' => [
                    'identifier' => 'identifier2',
                    'color' => 'color2',
                    'sourceInv' => 'sourceInv2',
                    'quantity' => 2,
                    'key' => 'i:identifier2-c:color2',
                ],
            ],
            [
                'params' => [
                    'identifier3',
                    'color3',
                    'sourceInv3',
                    3,
                ],
                'results' => [
                    'identifier' => 'identifier3',
                    'color' => 'color3',
                    'sourceInv' => 'sourceInv3',
                    'quantity' => 3,
                    'key' => 'i:identifier3-c:color3',
                ],
            ],
        ];
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetQuantity(array $params, array $results): void
    {
        $part = new LDCadPart(...$params);

        $this->assertSame($results['quantity'], $part->quantity);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetQuantity(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new LDCadPart(...$params);

        $part->quantity = 1;
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetIdentifier(array $params, array $results): void
    {
        $part = new LDCadPart(...$params);

        $this->assertSame($results['identifier'], $part->identifier);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetIdentifier(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new LDCadPart(...$params);

        $part->identifier = 'test';
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetColor(array $params, array $results): void
    {
        $part = new LDCadPart(...$params);

        $this->assertSame($results['color'], $part->color);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetColor(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new LDCadPart(...$params);

        $part->color = 'test';
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGetSourceInv(array $params, array $results): void
    {
        $part = new LDCadPart(...$params);

        $this->assertSame($results['sourceInv'], $part->sourceInv);
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testSetSourceInv(array $params, array $results): void
    {
        $this->expectException(\Error::class);
        $part = new LDCadPart(...$params);

        $part->sourceInv = 'test';
    }

    #[DataProvider('paramsAndResultsProvider')]
    public function testGenerateKey(array $params, array $results): void
    {
        $part = new LDCadPart(...$params);

        $this->assertSame($results['key'], $part->generateKey());
    }
}