<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator;

use Vogaeael\RebrickablePartListsComparer\Model\InterfaceRebrickablePart;

class RebrickablePartEqualsDecorator implements InterfaceRebrickablePart
{
    public int $spareQuantity {
        get {
            return $this->decorated->spareQuantity;
        }
    }

    public string $part {
        get {
            return $this->decorated->part;
        }
    }

    public string $color {
        get {
            return $this->decorated->color;
        }
    }

    public int $quantity {
        get {
            return $this->decorated->quantity;
        }
    }

    public function __construct(
        private readonly InterfaceRebrickablePart $decorated
    ) {
    }

    public function equals(InterfaceRebrickablePart $other): bool
    {
        if ($other->part !== $this->decorated->part) {
            return false;
        }
        if ($other->color !== $this->decorated->color) {
            return false;
        }
        if ($other->quantity !== $this->decorated->quantity) {
            return false;
        }
        if ($other->spareQuantity !== $this->decorated->spareQuantity) {
            return false;
        }

        return true;
    }

    public function combine(InterfaceRebrickablePart $part): void
    {
        $this->decorated->combine($part);
    }

    public function generateKey(): string
    {
        return $this->decorated->generateKey();
    }
}
