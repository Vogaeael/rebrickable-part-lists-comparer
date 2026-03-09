<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\BrickStoreBSXPart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class BrickStoreBSXSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, Part $partB): Part
    {
        $this->checkClass->checkClass($partA, BrickStoreBSXPart::class);
        $this->checkClass->checkClass($partB, BrickStoreBSXPart::class);

        /** @var BrickStoreBSXPart $partA */
        /** @var BrickStoreBSXPart $partB */
        $quantity = max(0, $partA->getQuantity() - $partB->getQuantity());

        return new BrickStoreBSXPart($partA->getItemTypeId(), $partA->getItemId(), $partA->getColorId(), $quantity);
    }
}
