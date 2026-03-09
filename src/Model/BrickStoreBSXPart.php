<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

class BrickStoreBSXPart extends AbstractPart
{
    private string $itemTypeId;
    private string $itemId;
    private string $colorId;

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

    public function getItemTypeId(): string
    {
        return $this->itemTypeId;
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
        return sprintf('t:%s-i:%s-c:%s', $this->itemTypeId, $this->itemId, $this->colorId);
    }
}
