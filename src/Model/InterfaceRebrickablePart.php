<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

interface InterfaceRebrickablePart extends InterfacePartWithSpareParts
{
    public string $part {
        get;
    }

    public string $color {
        get;
    }

    public function combine(InterfaceRebrickablePart $part): void;
}
