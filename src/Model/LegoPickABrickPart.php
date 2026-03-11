<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

class LegoPickABrickPart extends AbstractPart implements InterfaceLegoPickABrickPart
{
    private(set) string $elementId {
        get {
            return $this->elementId;
        }
    }

    public function __construct(string $elementId, int $quantity)
    {
        parent::__construct($quantity);
        $this->elementId = $elementId;
    }

    public function generateKey(): string
    {
        return $this->elementId;
    }
}
