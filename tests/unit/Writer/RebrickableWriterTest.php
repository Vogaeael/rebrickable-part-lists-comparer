<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Writer;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart;
use Vogaeael\RebrickablePartListsComparer\Writer\RebrickableWriter;

final class RebrickableWriterTest extends TestCase
{
    public function testWritePart(): void
    {
        $parts = [];
        $part = new RebrickablePart('partA', 'colorA', 3, 0);
        $parts[$part->generateKey()] = $part;
        $part = new RebrickablePart('partB', 'colorB', 453, 12);
        $parts[$part->generateKey()] = $part;
        $part = new RebrickablePart('partC', 'colorC', 0, 4);
        $parts[$part->generateKey()] = $part;

        $filePath = __DIR__ . '/../../data/write/unit_rebrickable_parts.csv';

        $writer = new RebrickableWriter(new CheckClass());
        $writer->writePart($parts, $filePath);

        $expected = 'Part,Color,Quantity,Is Spare' . PHP_EOL;
        $expected .= 'partA,colorA,3,False' . PHP_EOL;
        $expected .= 'partB,colorB,453,False' . PHP_EOL;
        $expected .= 'partB,colorB,12,True' . PHP_EOL;
        $expected .= 'partC,colorC,4,True' . PHP_EOL;

        $actual = file_get_contents($filePath);
        $this->assertEquals($expected, $actual);

        unlink($filePath);
    }
}
