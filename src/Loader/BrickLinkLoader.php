<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Loader;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;

class BrickLinkLoader extends AbstractLoader
{
    /**
     * @throws Exception
     */
    public function load(string $filePath): array
    {
        $this->doesFileExistOrException($filePath);

        $parts = [];
        $parentElement = simplexml_load_file($filePath);
        foreach ($parentElement['INVENTORY']->children() as $item) {
            $itemType = (string) $item['ITEMTYPE'];
            $itemId = (string) $item['ITEMID'];
            $colorId = (string) $item['COLORID'];
            $quantity = (int) $item['MINQTY'];
            $part = new BrickLinkPart($itemType, $itemId, $colorId, $quantity);
            $parts[$part->generateKey()] = $part;
        }

        return $parts;
    }
}
