<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

interface Part
{
    protected(set) int $quantity {
        get;
    }
    public function generateKey(): string;
}
