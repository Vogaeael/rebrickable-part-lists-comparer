<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\LegoPickABrickPart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class LegoPickABrickSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, Part $partB): Part
    {
        $this->checkClass->checkClass($partA, LegoPickABrickPart::class);
        $this->checkClass->checkClass($partB, LegoPickABrickPart::class);

        /** @var LegoPickABrickPart $partA */
        /** @var LegoPickABrickPart $partB */
        $quantity = max(0, $partA->getQuantity() - $partB->getQuantity());

        return new LegoPickABrickPart($partA->getElementId(), $quantity);
    }
}
