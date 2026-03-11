<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

interface InterfaceBrickLinkPart extends Part
{
    public string $itemType {
        get;
    }

    public string $itemId {
        get;
    }

    public string $colorId {
        get;
    }
}
