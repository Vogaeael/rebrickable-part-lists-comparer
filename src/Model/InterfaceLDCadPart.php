<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

interface InterfaceLDCadPart extends Part
{
    public string $identifier {
        get;
    }

    public string $color {
        get;
    }

    public string $sourceInv {
        get;
    }
}
