<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator;

use Vogaeael\RebrickablePartListsComparer\Model\InterfaceLDCadPart;

class LDCadPartEqualsDecorator implements InterfaceLDCadPart
{
    public string $identifier {
        get {
            return $this->decorated->identifier;
        }
    }

    public string $color {
        get {
            return $this->decorated->color;
        }
    }

    public string $sourceInv {
        get {
            return $this->decorated->sourceInv;
        }
    }

    public int $quantity {
        get {
            return $this->decorated->quantity;
        }
    }

    public function __construct(
        private readonly InterfaceLDCadPart $decorated
    ) {
    }

    public function equals(InterfaceLDCadPart $other): bool
    {
        if ($other->identifier !== $this->decorated->identifier) {
            return false;
        }
        if ($other->color !== $this->decorated->color) {
            return false;
        }
        if ($other->sourceInv !== $this->decorated->sourceInv) {
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
