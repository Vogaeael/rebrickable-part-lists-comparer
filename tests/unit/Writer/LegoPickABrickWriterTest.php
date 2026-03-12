<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Writer;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\LegoPickABrickPart;
use Vogaeael\RebrickablePartListsComparer\Writer\LegoPickABrickWriter;

class LegoPickABrickWriterTest extends TestCase
{
    public function testWritePart(): void
    {
        $parts = [];
        $part = new LegoPickABrickPart('elementIdA', 3);
        $parts[$part->generateKey()] = $part;
        $part = new LegoPickABrickPart('elementIdB', 453);
        $parts[$part->generateKey()] = $part;
        $part = new LegoPickABrickPart('elementIdC', 0);
        $parts[$part->generateKey()] = $part;
        $part = new LegoPickABrickPart('elementIdD', 26);
        $parts[$part->generateKey()] = $part;

        $filePath = __DIR__ . '/../../data/write/unit_lego_pab_parts.csv';

        $writer = new LegoPickABrickWriter(new CheckClass());
        $writer->writePart($parts, $filePath);

        $expected = 'elementId,quantity' . PHP_EOL;
        $expected .= 'elementIdA,3' . PHP_EOL;
        $expected .= 'elementIdB,453' . PHP_EOL;
        $expected .= 'elementIdD,26' . PHP_EOL;

        $actual = file_get_contents($filePath);
        $this->assertEquals($expected, $actual);

        unlink($filePath);
    }
}
