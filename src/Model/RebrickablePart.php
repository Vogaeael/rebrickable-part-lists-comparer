<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

class RebrickablePart extends PartWithSpareParts
{
    private(set) string $part {
        get {
            return $this->part;
        }
    }

    private(set) string $color {
        get {
            return $this->color;
        }
    }

    public function __construct(
        string $part,
        string $color,
        int $quantity,
        int $spareQuantity
    ) {
        parent::__construct($quantity, $spareQuantity);
        $this->part = $part;
        $this->color = $color;
    }

    public function generateKey(): string
    {
        return sprintf('p:%s-c:%d', $this->part, $this->color);
    }

    public function combine(RebrickablePart $part): void
    {
        $this->quantity += $part->quantity;
        $this->spareQuantity += $part->spareQuantity;
    }
}
