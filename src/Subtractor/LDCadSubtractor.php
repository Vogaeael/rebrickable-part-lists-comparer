<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\LDCadPart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class LDCadSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, Part $partB): Part
    {
        $this->checkClass->checkClass($partA, LDCadPart::class);
        $this->checkClass->checkClass($partB, LDCadPart::class);

        /** @var LDCadPart $partA */
        /** @var LDCadPart $partB */
        $quantity = max(0, $partA->getQuantity() - $partB->getQuantity());

        return new LDCadPart($partA->getIdentifier(), $partA->getColor(), $partA->getSourceInv(), $quantity);
    }
}
