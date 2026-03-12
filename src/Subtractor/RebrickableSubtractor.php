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
    public function subtract(Part $partMinuend, ?Part $partSubtrahend): InterfaceRebrickablePart
    {
        $this->checkClass->checkClass($partMinuend, InterfaceRebrickablePart::class);
        $bQuantity = $partSubtrahend->quantity ?? 0;
        $bSpareQuantity = 0;
        if (null !== $partSubtrahend) {
            $this->checkClass->checkClass($partSubtrahend, InterfaceRebrickablePart::class);

            /** @var InterfaceRebrickablePart $partSubtrahend */
            $bSpareQuantity = $partSubtrahend->spareQuantity;
        }

        /** @var InterfaceRebrickablePart $partMinuend */
        $quantity = max(0, $partMinuend->quantity - $bQuantity);
        $spareQuantity = max(0, $partMinuend->spareQuantity - $bSpareQuantity);

        return new RebrickablePart($partMinuend->part, $partMinuend->color, $quantity, $spareQuantity);
    }
}
