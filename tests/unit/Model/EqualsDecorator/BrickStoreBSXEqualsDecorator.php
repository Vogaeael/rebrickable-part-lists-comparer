<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator;

use Vogaeael\RebrickablePartListsComparer\Model\InterfaceBrickStoreBSXPart;

class BrickStoreBSXEqualsDecorator implements InterfaceBrickStoreBSXPart
{
    public string $itemTypeId {
        get {
            return $this->decorated->itemTypeId;
        }
    }
    public string $itemId {
        get {
            return $this->decorated->itemId;
        }
    }
    public string $colorId {
        get {
            return $this->decorated->colorId;
        }
    }
    public int $quantity {
        get {
            return $this->decorated->quantity;
        }
    }
    
    public function __construct(
        private readonly InterfaceBrickStoreBSXPart $decorated
    ) {
    }

    public function equals(InterfaceBrickStoreBSXPart $other): bool
    {
        if ($other->itemTypeId !== $this->itemTypeId) {
            return false;
        }
        if ($other->itemId !== $this->itemId) {
            return false;
        }
        if ($other->colorId !== $this->colorId) {
            return false;
        }
        if ($other->quantity !== $this->quantity) {
            return false;
        }

        return true;
    }

    public function generateKey(): string
    {
        return $this->decorated->generateKey();
    }
}
