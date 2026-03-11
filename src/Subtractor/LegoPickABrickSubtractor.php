<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\InterfaceLegoPickABrickPart;
use Vogaeael\RebrickablePartListsComparer\Model\LegoPickABrickPart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class LegoPickABrickSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, ?Part $partB): Part
    {
        $this->checkClass->checkClass($partA, InterfaceLegoPickABrickPart::class);
        $bQuantity = $partB->quantity ?? 0;

        /** @var InterfaceLegoPickABrickPart $partA */
        $quantity = max(0, $partA->quantity - $bQuantity);

        return new LegoPickABrickPart($partA->elementId, $quantity);
    }
}
