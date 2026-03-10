<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class BrickLinkSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, ?Part $partB): BrickLinkPart
    {
        $this->checkClass->checkClass($partA, BrickLinkPart::class);
        $bQuantity = $partB->quantity ?? 0;

        /** @var BrickLinkPart $partA */
        $quantity = max(0, $partA->quantity - $bQuantity);

        return new BrickLinkPart($partA->itemType, $partA->itemId, $partA->colorId, $quantity);
    }
}
