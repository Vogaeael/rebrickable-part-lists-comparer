<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;

class BrickLinkWriter extends AbstractWriter
{
    /**
     * @throws Exception
     */
    public function writePart(array $parts, string $filePath): void
    {
        $xml = '<INVENTORY>' . PHP_EOL;
        foreach ($parts as $part) {
            $this->checkClass->checkClass($part, BrickLinkPart::class);
            if ($part->getQuantity() === 0) {
                continue;
            }

            /** @var BrickLinkPart $part */
            $xml .= '\t<ITEM>' . PHP_EOL;
            $xml .= '\t\t<ITEMTYPE>' . $part->getItemType() . '</ITEMTYPE>' . PHP_EOL;
            $xml .= '\t\t<ITEMID>' . $part->getItemId() . '</ITEMID>' . PHP_EOL;
            $xml .= '\t\t<COLOR>' . $part->getColorId() . '</COLOR>' . PHP_EOL;
            $xml .= '\t\t<MINQTY>' . $part->getQuantity() . '</MINQTY>' . PHP_EOL;
            $xml .= '\t</ITEM>' . PHP_EOL;
        }

        $xml .= '</INVENTORY>';

        file_put_contents($filePath, $xml);
    }
}
