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
    public function subtract(Part $partMinuend, ?Part $partSubtrahend): InterfaceLegoPickABrickPart
    {
        $this->checkClass->checkClass($partMinuend, InterfaceLegoPickABrickPart::class);
        $bQuantity = $partSubtrahend->quantity ?? 0;

        /** @var InterfaceLegoPickABrickPart $partMinuend */
        $quantity = max(0, $partMinuend->quantity - $bQuantity);

        return new LegoPickABrickPart($partMinuend->elementId, $quantity);
    }
}
