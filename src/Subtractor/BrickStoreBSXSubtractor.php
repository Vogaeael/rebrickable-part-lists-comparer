<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\BrickStoreBSXPart;
use Vogaeael\RebrickablePartListsComparer\Model\InterfaceBrickStoreBSXPart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class BrickStoreBSXSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, ?Part $partB): Part
    {
        $this->checkClass->checkClass($partA, InterfaceBrickStoreBSXPart::class);
        $bQuantity = $partB->quantity ?? 0;

        /** @var InterfaceBrickStoreBSXPart $partA */
        $quantity = max(0, $partA->quantity - $bQuantity);

        return new BrickStoreBSXPart($partA->itemTypeId, $partA->itemId, $partA->colorId, $quantity);
    }
}
