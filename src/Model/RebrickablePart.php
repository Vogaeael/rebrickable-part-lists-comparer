<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

class RebrickablePart extends PartWithSpareParts
{
    private string $part;
    private string $color;

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

    public function getPart(): string
    {
        return $this->part;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function generateKey(): string
    {
        return sprintf('p:%s-c:%d', $this->part, $this->color);
    }

    public function combine(RebrickablePart $part): void
    {
        $this->quantity += $part->getQuantity();
        $this->spareQuantity += $part->getSpareQuantity();
    }
}
