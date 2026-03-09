<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\Part;
use Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart;

class RebrickableSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, ?Part $partB): Part
    {
        $this->checkClass->checkClass($partA, RebrickablePart::class);
        $bQuantity = $partB?->getQuantity() ?? 0;
        $bSpareQuantity = 0;
        if (null !== $partB) {
            $this->checkClass->checkClass($partB, RebrickablePart::class);

            /** @var RebrickablePart $partB */
            $bSpareQuantity = $partB->getSpareQuantity();
        }

        /** @var RebrickablePart $partA */
        $quantity = max(0, $partA->getQuantity() - $bQuantity);
        $spareQuantity = max(0, $partA->getSpareQuantity() - $bSpareQuantity);

        return new RebrickablePart($partA->getPart(), $partA->getColor(), $quantity, $spareQuantity);
    }
}
