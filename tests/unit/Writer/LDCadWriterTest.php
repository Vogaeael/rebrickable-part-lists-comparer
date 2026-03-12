<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Writer;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\LDCadPart;
use Vogaeael\RebrickablePartListsComparer\Writer\LDCadWriter;

class LDCadWriterTest extends TestCase
{
    public function testWritePart(): void
    {
        $parts = [];
        $part = new LDCadPart('identifierA', 'colorIdA', 'sourceInvA', 3);
        $parts[$part->generateKey()] = $part;
        $part = new LDCadPart('identifierB', 'colorIdB', 'sourceInvB', 453);
        $parts[$part->generateKey()] = $part;
        $part = new LDCadPart('identifierC', 'colorIdC', 'sourceInvC', 0);
        $parts[$part->generateKey()] = $part;
        $part = new LDCadPart('identifierD', 'colorIdD', 'sourceInvD', 26);
        $parts[$part->generateKey()] = $part;

        $filePath = __DIR__ . '/../../data/write/ldcad_parts.pbg';

        $writer = new LDCadWriter(new CheckClass());
        $writer->writePart($parts, $filePath);

        $expected = '[options]' . PHP_EOL;
        $expected .= 'kind=basic' . PHP_EOL;
        $expected .= 'caption=result' . PHP_EOL;
        $expected .= 'sortOn=description' . PHP_EOL . PHP_EOL;
        $expected .= '<items>' . PHP_EOL;
        $expected .= 'identifierA.dat:[sourceInv=sourceInvA] [color=colorIdA] [count=3]' . PHP_EOL;
        $expected .= 'identifierB.dat:[sourceInv=sourceInvB] [color=colorIdB] [count=453]' . PHP_EOL;
        $expected .= 'identifierD.dat:[sourceInv=sourceInvD] [color=colorIdD] [count=26]' . PHP_EOL;

        $actual = file_get_contents($filePath);
        $this->assertEquals($expected, $actual);

        unlink($filePath);
    }
}
