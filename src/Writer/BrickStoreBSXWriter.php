<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\BrickStoreBSXPart;

class BrickStoreBSXWriter extends AbstractWriter
{
    /**
     * @throws Exception
     */
    public function writePart(array $parts): void
    {
        $xml = '<BrickStoreXML><Inventory>' . PHP_EOL;
        foreach ($parts as $part) {
            $this->checkClassType($part, BrickStoreBSXPart::class);
            if ($part->getQuantity() === 0) {
                continue;
            }

            /** @var BrickStoreBSXPart $part */
            $xml .= '<Item>';
            $xml .= '<ItemTypeID>' . $part->getItemTypeId() . '</ItemTypeID>';
            $xml .= '<ItemID>' . $part->getItemId() . '</ItemID>';
            $xml .= '<ColorID>' . $part->getColorId() . '</ColorID>';
            $xml .= '<Qty>' . $part->getQuantity() . '</Qty>';
            $xml .= '</Item>';
        }

        $xml .= '</Inventory></BrickStoreXML>';

        file_put_contents('data/brickstore-result.bsx', $xml);
    }
}
