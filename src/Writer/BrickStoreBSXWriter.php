<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Vogaeael\RebrickablePartListsComparer\Model\InterfaceBrickStoreBSXPart;

class BrickStoreBSXWriter extends AbstractWriter
{
    /**
     * @inheritDoc
     */
    public function writePart(array $parts, string $filePath): void
    {
        $xml = '<BrickStoreXML><Inventory>';
        foreach ($parts as $part) {
            $this->checkClass->checkClass($part, InterfaceBrickStoreBSXPart::class);
            if ($part->quantity === 0) {
                continue;
            }

            /** @var InterfaceBrickStoreBSXPart $part */
            $xml .= '<Item>';
            $xml .= '<ItemTypeID>' . $part->itemTypeId . '</ItemTypeID>';
            $xml .= '<ItemID>' . $part->itemId . '</ItemID>';
            $xml .= '<ColorID>' . $part->colorId . '</ColorID>';
            $xml .= '<Qty>' . $part->quantity . '</Qty>';
            $xml .= '</Item>';
        }

        $xml .= '</Inventory></BrickStoreXML>';

        file_put_contents($filePath, $xml);
    }
}
