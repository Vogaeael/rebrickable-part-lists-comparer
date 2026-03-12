<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator;

use Vogaeael\RebrickablePartListsComparer\Model\InterfaceLegoPickABrickPart;

class LegoPickABrickPartEqualsDecorator implements InterfaceLegoPickABrickPart
{
    public string $elementId {
        get {
            return $this->decorated->elementId;
        }
    }

    public int $quantity {
        get {
            return $this->decorated->quantity;
        }
    }

    public function __construct(
        private readonly InterfaceLegoPickABrickPart $decorated
    ) {
    }

    public function equals(InterfaceLegoPickABrickPart $other): bool
    {
        if ($other->elementId !== $this->decorated->elementId) {
            return false;
        }
        if ($other->quantity !== $this->decorated->quantity) {
            return false;
        }

        return true;
    }

    public function generateKey(): string
    {
        return $this->decorated->generateKey();
    }
}
