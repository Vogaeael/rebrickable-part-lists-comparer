<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Loader;

use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;

class BrickLinkLoader extends AbstractLoader
{
    /**
     * @inheritDoc
     */
    public function load(string $filePath): array
    {
        $this->doesFileExistOrException($filePath);

        $parts = [];
        $parentElement = simplexml_load_file($filePath);
        foreach ($parentElement->xpath('/INVENTORY/ITEM') as $item) {
            $itemType = (string) $item->xpath('ITEMTYPE')[0];
            $itemId = (string) $item->xpath('ITEMID')[0];
            $colorId = (string) $item->xpath('COLOR')[0];
            $quantity = (int) $item->xpath('MINQTY')[0];
            $part = new BrickLinkPart($itemType, $itemId, $colorId, $quantity);
            $parts[$part->generateKey()] = $part;
        }

        return $parts;
    }
}
