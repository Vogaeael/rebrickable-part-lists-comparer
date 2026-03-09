<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class BrickLinkSubtractor extends AbstractSubtractor
{
    /**
     * @throws Exception
     */
    public function subtract(Part $partA, Part $partB): BrickLinkPart
    {
        $this->checkClass->checkClass($partA, BrickLinkPart::class);
        $this->checkClass->checkClass($partB, BrickLinkPart::class);

        /** @var BrickLinkPart $partA */
        /** @var BrickLinkPart $partB */
        $quantity = max(0, $partA->getQuantity() - $partB->getQuantity());

        return new BrickLinkPart($partA->getItemType(), $partA->getItemId(), $partA->getColorId(), $quantity);
    }
}
