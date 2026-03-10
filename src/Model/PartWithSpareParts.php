<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

abstract class PartWithSpareParts extends AbstractPart
{
    protected(set) int $spareQuantity {
        get {
            return $this->spareQuantity;
        }
    }

    public function __construct(int $quantity, int $spareQuantity)
    {
        parent::__construct($quantity);
        $this->spareQuantity = $spareQuantity;
    }

    abstract public function generateKey(): string;
}