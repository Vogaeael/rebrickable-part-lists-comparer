<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

abstract class PartWithSpareParts extends AbstractPart
{
    protected int $spareQuantity;

    public function __construct(int $quantity, int $spareQuantity)
    {
        parent::__construct($quantity);
        $this->spareQuantity = $spareQuantity;
    }

    public function getSpareQuantity(): int
    {
        return $this->spareQuantity;
    }

    abstract public function generateKey(): string;
}