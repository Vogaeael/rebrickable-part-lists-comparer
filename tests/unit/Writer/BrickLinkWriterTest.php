<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Writer;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;
use Vogaeael\RebrickablePartListsComparer\Writer\BrickLinkWriter;

class BrickLinkWriterTest extends TestCase
{
    public function testWritePart(): void
    {
        $parts = [];
        $part = new BrickLinkPart('itemTypeA', 'itemIdA', 'colorIdA', 3);
        $parts[$part->generateKey()] = $part;
        $part = new BrickLinkPart('itemTypeB', 'itemIdB', 'colorIdB', 453);
        $parts[$part->generateKey()] = $part;
        $part = new BrickLinkPart('itemTypeC', 'itemIdC', 'colorIdC', 0);
        $parts[$part->generateKey()] = $part;
        $part = new BrickLinkPart('itemTypeD', 'itemIdD', 'colorIdD', 26);
        $parts[$part->generateKey()] = $part;

        $filePath = __DIR__ . '/../../data/write/brick_link_parts.xml';

        $writer = new BrickLinkWriter(new CheckClass());
        $writer->writePart($parts, $filePath);

        $expected = '<INVENTORY>' . PHP_EOL;
        $expected .= "\t<ITEM>" . PHP_EOL;
        $expected .= "\t\t<ITEMTYPE>itemTypeA</ITEMTYPE>" . PHP_EOL;
        $expected .= "\t\t<ITEMID>itemIdA</ITEMID>" . PHP_EOL;
        $expected .= "\t\t<COLOR>colorIdA</COLOR>" . PHP_EOL;
        $expected .= "\t\t<MINQTY>3</MINQTY>" . PHP_EOL;
        $expected .= "\t</ITEM>" . PHP_EOL;
        $expected .= "\t<ITEM>" . PHP_EOL;
        $expected .= "\t\t<ITEMTYPE>itemTypeB</ITEMTYPE>" . PHP_EOL;
        $expected .= "\t\t<ITEMID>itemIdB</ITEMID>" . PHP_EOL;
        $expected .= "\t\t<COLOR>colorIdB</COLOR>" . PHP_EOL;
        $expected .= "\t\t<MINQTY>453</MINQTY>" . PHP_EOL;
        $expected .= "\t</ITEM>" . PHP_EOL;
        $expected .= "\t<ITEM>" . PHP_EOL;
        $expected .= "\t\t<ITEMTYPE>itemTypeD</ITEMTYPE>" . PHP_EOL;
        $expected .= "\t\t<ITEMID>itemIdD</ITEMID>" . PHP_EOL;
        $expected .= "\t\t<COLOR>colorIdD</COLOR>" . PHP_EOL;
        $expected .= "\t\t<MINQTY>26</MINQTY>" . PHP_EOL;
        $expected .= "\t</ITEM>" . PHP_EOL;
        $expected .= "</INVENTORY>";

        $actual = file_get_contents($filePath);
        $this->assertEquals($expected, $actual);

        unlink($filePath);
    }
}
