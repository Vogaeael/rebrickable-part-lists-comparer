<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;
use Vogaeael\RebrickablePartListsComparer\Model\InterfaceBrickLinkPart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class BrickLinkSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partMinuend, ?Part $partSubtrahend): InterfaceBrickLinkPart
    {
        $this->checkClass->checkClass($partMinuend, InterfaceBrickLinkPart::class);
        $bQuantity = $partSubtrahend->quantity ?? 0;

        /** @var InterfaceBrickLinkPart $partMinuend */
        $quantity = max(0, $partMinuend->quantity - $bQuantity);

        return new BrickLinkPart($partMinuend->itemType, $partMinuend->itemId, $partMinuend->colorId, $quantity);
    }
}
