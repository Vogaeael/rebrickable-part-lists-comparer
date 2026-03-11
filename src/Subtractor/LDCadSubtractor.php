<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\InterfaceLDCadPart;
use Vogaeael\RebrickablePartListsComparer\Model\LDCadPart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class LDCadSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, ?Part $partB): InterfaceLDCadPart
    {
        $this->checkClass->checkClass($partA, InterfaceLDCadPart::class);
        $bQuantity = $partB->quantity ?? 0;

        /** @var InterfaceLDCadPart $partA */
        $quantity = max(0, $partA->quantity - $bQuantity);

        return new LDCadPart($partA->identifier, $partA->color, $partA->sourceInv, $quantity);
    }
}
