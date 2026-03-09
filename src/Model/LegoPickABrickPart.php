<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

class LegoPickABrickPart extends AbstractPart
{
    private string $elementId;

    public function __construct(string $elementId, int $quantity)
    {
        parent::__construct($quantity);
        $this->elementId = $elementId;
    }

    public function getElementId(): string
    {
        return $this->elementId;
    }

    public function generateKey(): string
    {
        return $this->elementId;
    }
}
