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
    public function subtract(Part $partMinuend, ?Part $partSubtrahend): InterfaceLDCadPart
    {
        $this->checkClass->checkClass($partMinuend, InterfaceLDCadPart::class);
        $bQuantity = $partSubtrahend->quantity ?? 0;

        /** @var InterfaceLDCadPart $partMinuend */
        $quantity = max(0, $partMinuend->quantity - $bQuantity);

        return new LDCadPart($partMinuend->identifier, $partMinuend->color, $partMinuend->sourceInv, $quantity);
    }
}
