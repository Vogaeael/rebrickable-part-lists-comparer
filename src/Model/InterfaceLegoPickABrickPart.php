<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

interface InterfaceLegoPickABrickPart extends Part
{
    public string $elementId {
        get;
    }
}
