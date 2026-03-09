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
    public function subtract(Part $partA, Part $partB): Part
    {
        $this->checkClass->checkClass($partA, RebrickablePart::class);
        $this->checkClass->checkClass($partB, RebrickablePart::class);

        /** @var RebrickablePart $partA */
        /** @var RebrickablePart $partB */
        $quantity = max(0, $partA->getQuantity() - $partB->getQuantity());
        $spareQuantity = max(0, $partA->getSpareQuantity() - $partB->getSpareQuantity());

        return new RebrickablePart($partA->getPart(), $partA->getColor(), $quantity, $spareQuantity);
    }
}
