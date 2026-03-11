<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator;

use Vogaeael\RebrickablePartListsComparer\Model\InterfaceBrickLinkPart;

class BrickLinkPartEqualsDecorator implements InterfaceBrickLinkPart
{
    public string $itemType {
        get {
            return $this->decorated->itemType;
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
        private readonly InterfaceBrickLinkPart $decorated
    ) {
    }

    public function equals(InterfaceBrickLinkPart $other): bool
    {
        if ($other->itemType !== $this->decorated->itemType) {
            return false;
        }
        if ($other->itemId !== $this->decorated->itemId) {
            return false;
        }
        if ($other->colorId !== $this->decorated->colorId) {
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
