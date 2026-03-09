<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

interface Part
{
    public function getQuantity(): int;
    public function generateKey(): string;
}
