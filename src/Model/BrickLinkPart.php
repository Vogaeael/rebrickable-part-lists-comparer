<?php

namespace Vogaeael\RebrickablePartListsComparer\Model;

class BrickLinkPart extends AbstractPart
{
    private string $itemType;
    private string $itemId;
    private string $colorId;

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

    public function getItemType(): string
    {
        return $this->itemType;
    }

    public function getItemId(): string
    {
        return $this->itemId;
    }

    public function getColorId(): string
    {
        return $this->colorId;
    }

    public function generateKey(): string
    {
        return sprintf('t:%s-i:%s-c:%s', $this->itemType, $this->itemId, $this->colorId);
    }
}
