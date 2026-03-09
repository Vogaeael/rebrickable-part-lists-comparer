<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

abstract class AbstractPart implements Part
{
    protected int $quantity;

    public function __construct(int $quantity) {
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
