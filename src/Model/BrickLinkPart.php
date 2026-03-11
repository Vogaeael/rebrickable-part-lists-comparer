<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

class BrickLinkPart extends AbstractPart implements InterfaceBrickLinkPart
{
    private(set) string $itemType {
        get {
            return $this->itemType;
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
        string $itemType,
        string $itemId,
        string $colorId,
        int $quantity
    ) {
        parent::__construct($quantity);
        $this->itemType = $itemType;
        $this->itemId = $itemId;
        $this->colorId = $colorId;
    }

    public function generateKey(): string
    {
        return sprintf('t:%s-i:%s-c:%s', $this->itemType, $this->itemId, $this->colorId);
    }
}
