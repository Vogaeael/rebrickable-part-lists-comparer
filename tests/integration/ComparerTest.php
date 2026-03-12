<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\integration;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Comparer;
use Vogaeael\RebrickablePartListsComparer\Model\InterfaceRebrickablePart;
use Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart;
use Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator\RebrickablePartEqualsDecorator;
use Vogaeael\RebrickablePartListsComparer\Types;

final class ComparerTest extends TestCase
{
    public function testSubtractFiles(): void
    {
        $filePathMinuend = __DIR__ . '/../data/rebrickable_parts_minuend.csv';
        $filePathSubtrahend = __DIR__ . '/../data/rebrickable_parts.csv';

        $filePathResult = __DIR__ . '/../data/write/integration_rebrickable_parts_result.csv';

        $comparer = new Comparer();
        $comparer->subtractFiles(Types::Rebrickable, $filePathMinuend, $filePathSubtrahend, $filePathResult);

        $expected = 'Part,Color,Quantity,Is Spare' . PHP_EOL;
        $expected .= '99781,0,2,False' . PHP_EOL;
        $expected .= '970c27pr0039,7,3,False' . PHP_EOL;
        $expected .= '6141,11,2,False' . PHP_EOL;

        $this->assertEquals($expected, file_get_contents($filePathResult));

        unlink($filePathResult);
    }

    public function testSubtractList(): void
    {
        $partsMinuend = [];
        $part = new RebrickablePart('partA', 'colorA', 25, 3);
        $partsMinuend[$part->generateKey()] = $part;
        $part = new RebrickablePart('partB', 'colorB', 4, 0);
        $partsMinuend[$part->generateKey()] = $part;
        $part = new RebrickablePart('partC', 'colorC', 145, 25);
        $partsMinuend[$part->generateKey()] = $part;

        $partsSubtrahend = [];
        $part = new RebrickablePart('partA', 'colorA', 12, 1);
        $partsSubtrahend[$part->generateKey()] = $part;
        $part = new RebrickablePart('partC', 'colorC', 400, 12);
        $partsSubtrahend[$part->generateKey()] = $part;
        $part = new RebrickablePart('partD', 'colorD', 45, 5);
        $partsSubtrahend[$part->generateKey()] = $part;

        $partsExpected = [];
        $part = new RebrickablePart('partA', 'colorA', 13, 2);
        $partsExpected[$part->generateKey()] = $part;
        $part = new RebrickablePart('partB', 'colorB', 4, 0);
        $partsExpected[$part->generateKey()] = $part;
        $part = new RebrickablePart('partC', 'colorC', 0, 13);
        $partsExpected[$part->generateKey()] = $part;


        $comparer = new Comparer();

        $actualList = $comparer->subtractList(Types::Rebrickable, $partsMinuend, $partsSubtrahend);

        foreach ($actualList as $actual) {
            $expected = $partsExpected[$actual->generateKey()] ?? null;
            if ($expected === null) {
                $this->fail('Expected not found');
            }

            $this->assertInstanceOf(InterfaceRebrickablePart::class, $actual);

            $this->assertObjectEquals($expected, new RebrickablePartEqualsDecorator($actual));
        }
    }
}
