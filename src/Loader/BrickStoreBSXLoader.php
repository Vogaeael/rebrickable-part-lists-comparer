<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Loader;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\BrickStoreBSXPart;

class BrickStoreBSXLoader extends AbstractLoader
{
    /**
     * @throws Exception
     */
    public function load(string $filePath): array
    {
        $this->doesFileExistOrException($filePath);

        $parts = [];
        $parentElement = simplexml_load_file($filePath);
        foreach ($parentElement->xpath('/BrickStoreXML/Inventory/Item') as $item) {
            $itemType = (string) $item->xpath('ItemTypeID')[0];
            $itemId = (string) $item->xpath('ItemID')[0];
            $colorId = (string) $item->xpath('ColorID')[0];
            $quantity = (int) $item->xpath('Qty')[0];
            $part = new BrickStoreBSXPart($itemType, $itemId, $colorId, $quantity);
            $parts[$part->generateKey()] = $part;
        }

        return $parts;
    }
}
