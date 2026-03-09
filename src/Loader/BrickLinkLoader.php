<?php

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
            $part = new BrickLinkPart($item['ITEMTYPE'], $item['ITEMID'], $item['COLOR'], $item['MINQTY']);
            $parts[$part->generateKey()] = $part;
        }

        return $parts;
    }
}
