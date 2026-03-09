<?php

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
            $part = new BrickStoreBSXPart($item['ItemTypeID'], $item['ItemID'], $item['ColorID'], $item['Qty']);
            $parts[$part->generateKey()] = $part;
        }

        return $parts;
    }
}
