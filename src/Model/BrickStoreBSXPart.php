<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

class BrickStoreBSXPart extends AbstractPart implements InterfaceBrickStoreBSXPart
{
    private(set) string $itemTypeId {
        get {
            return $this->itemTypeId;
        }
    }

    private(set) string $itemId {
        get {
            return $this->itemId;
        }
    }

    private(set) string $colorId {
        get {
            return $this->colorId;
        }
    }

    public function __construct(
        string $itemTypeId,
        string $itemId,
        string $colorId,
        int $quantity
    ) {
        parent::__construct($quantity);
        $this->itemTypeId = $itemTypeId;
        $this->itemId = $itemId;
        $this->colorId = $colorId;
    }

    public function generateKey(): string
    {
        return sprintf('t:%s-i:%s-c:%s', $this->itemTypeId, $this->itemId, $this->colorId);
    }
}
