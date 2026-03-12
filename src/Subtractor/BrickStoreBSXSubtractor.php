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
    public function subtract(Part $partMinuend, ?Part $partSubtrahend): InterfaceBrickStoreBSXPart
    {
        $this->checkClass->checkClass($partMinuend, InterfaceBrickStoreBSXPart::class);
        $bQuantity = $partSubtrahend->quantity ?? 0;

        /** @var InterfaceBrickStoreBSXPart $partMinuend */
        $quantity = max(0, $partMinuend->quantity - $bQuantity);

        return new BrickStoreBSXPart($partMinuend->itemTypeId, $partMinuend->itemId, $partMinuend->colorId, $quantity);
    }
}
