<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

interface InterfaceBrickStoreBSXPart extends Part
{
    public string $itemTypeId {
        get;
    }

    public string $itemId {
        get;
    }

    public string $colorId {
        get;
    }
}
