<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;

class BrickLinkWriter extends AbstractWriter
{
    /**
     * @inheritDoc
     */
    public function writePart(array $parts, string $filePath): void
    {
        $xml = '<INVENTORY>' . PHP_EOL;
        foreach ($parts as $part) {
            $this->checkClass->checkClass($part, BrickLinkPart::class);
            if ($part->quantity === 0) {
                continue;
            }

            /** @var BrickLinkPart $part */
            $xml .= "\t<ITEM>" . PHP_EOL;
            $xml .= "\t\t<ITEMTYPE>" . $part->itemType . '</ITEMTYPE>' . PHP_EOL;
            $xml .= "\t\t<ITEMID>" . $part->itemId . '</ITEMID>' . PHP_EOL;
            $xml .= "\t\t<COLOR>" . $part->colorId . '</COLOR>' . PHP_EOL;
            $xml .= "\t\t<MINQTY>" . $part->quantity . '</MINQTY>' . PHP_EOL;
            $xml .= "\t</ITEM>" . PHP_EOL;
        }

        $xml .= '</INVENTORY>';

        file_put_contents($filePath, $xml);
    }
}
