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
        foreach ($parentElement['BrickStoreXml']['Inventory']->children() as $item) {
            $itemType = (string) $item['ItemTypeID'];
            $itemId = (string) $item['ItemID'];
            $colorId = (string) $item['ColorID'];
            $quantity = (int) $item['Qty'];
            $part = new BrickStoreBSXPart($itemType, $itemId, $colorId, $quantity);
            $parts[$part->generateKey()] = $part;
        }

        return $parts;
    }
}
