<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

abstract class AbstractPart implements Part
{
    protected(set) int $quantity {
        get {
            return $this->quantity;
        }
    }

    public function __construct(int $quantity) {
        $this->quantity = $quantity;
    }
}
