<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Writer;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\BrickStoreBSXPart;
use Vogaeael\RebrickablePartListsComparer\Writer\BrickStoreBSXWriter;

final class BrickStoreBSXWriterTest extends TestCase
{
    public function testWritePart(): void
    {
        $parts = [];
        $part = new BrickStoreBSXPart('itemTypeA', 'itemIdA', 'colorIdA', 3);
        $parts[$part->generateKey()] = $part;
        $part = new BrickStoreBSXPart('itemTypeB', 'itemIdB', 'colorIdB', 453);
        $parts[$part->generateKey()] = $part;
        $part = new BrickStoreBSXPart('itemTypeC', 'itemIdC', 'colorIdC', 0);
        $parts[$part->generateKey()] = $part;
        $part = new BrickStoreBSXPart('itemTypeD', 'itemIdD', 'colorIdD', 26);
        $parts[$part->generateKey()] = $part;

        $filePath = __DIR__ . '/../../data/write/unit_brick_store_parts.bsx';

        $writer = new BrickStoreBSXWriter(new CheckClass());
        $writer->writePart($parts, $filePath);

        $expected = '<BrickStoreXML><Inventory><Item>';
        $expected .= '<ItemTypeID>itemTypeA</ItemTypeID>';
        $expected .= '<ItemID>itemIdA</ItemID>';
        $expected .= '<ColorID>colorIdA</ColorID>';
        $expected .= '<Qty>3</Qty>';
        $expected .= '</Item><Item>';
        $expected .= '<ItemTypeID>itemTypeB</ItemTypeID>';
        $expected .= '<ItemID>itemIdB</ItemID>';
        $expected .= '<ColorID>colorIdB</ColorID>';;
        $expected .= '<Qty>453</Qty>';
        $expected .= '</Item><Item>';
        $expected .= '<ItemTypeID>itemTypeD</ItemTypeID>';
        $expected .= '<ItemID>itemIdD</ItemID>';
        $expected .= '<ColorID>colorIdD</ColorID>';
        $expected .= '<Qty>26</Qty>';
        $expected .= '</Item></Inventory></BrickStoreXML>';

        $actual = file_get_contents($filePath);
        $this->assertEquals($expected, $actual);

        unlink($filePath);
    }
}
