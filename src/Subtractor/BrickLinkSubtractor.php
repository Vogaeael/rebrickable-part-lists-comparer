<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;
use Vogaeael\RebrickablePartListsComparer\Model\InterfaceBrickLinkPart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class BrickLinkSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, ?Part $partB): InterfaceBrickLinkPart
    {
        $this->checkClass->checkClass($partA, InterfaceBrickLinkPart::class);
        $bQuantity = $partB->quantity ?? 0;

        /** @var InterfaceBrickLinkPart $partA */
        $quantity = max(0, $partA->quantity - $bQuantity);

        return new BrickLinkPart($partA->itemType, $partA->itemId, $partA->colorId, $quantity);
    }
}
