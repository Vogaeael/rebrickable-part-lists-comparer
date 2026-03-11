<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\InterfaceRebrickablePart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;
use Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart;

class RebrickableSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, ?Part $partB): InterfaceRebrickablePart
    {
        $this->checkClass->checkClass($partA, InterfaceRebrickablePart::class);
        $bQuantity = $partB->quantity ?? 0;
        $bSpareQuantity = 0;
        if (null !== $partB) {
            $this->checkClass->checkClass($partB, InterfaceRebrickablePart::class);

            /** @var InterfaceRebrickablePart $partB */
            $bSpareQuantity = $partB->spareQuantity;
        }

        /** @var InterfaceRebrickablePart $partA */
        $quantity = max(0, $partA->quantity - $bQuantity);
        $spareQuantity = max(0, $partA->spareQuantity - $bSpareQuantity);

        return new RebrickablePart($partA->part, $partA->color, $quantity, $spareQuantity);
    }
}
