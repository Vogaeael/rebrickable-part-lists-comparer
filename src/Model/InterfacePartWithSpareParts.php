<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

interface InterfacePartWithSpareParts extends Part
{
    public int $spareQuantity {
        get;
    }
}
