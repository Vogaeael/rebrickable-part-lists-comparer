<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

class LDCadPart extends AbstractPart
{
    private string $identifier;
    private string $color;
    private string $sourceInv;

    public function __construct(
        string $identifier,
        string $color,
        string $sourceInv,
        int $quantity
    ) {
        parent::__construct($quantity);
        $this->identifier = $identifier;
        $this->color = $color;
        $this->sourceInv = $sourceInv;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getSourceInv(): string
    {
        return $this->sourceInv;
    }

    public function generateKey(): string
    {
        return sprintf('i:%s-c:%d', $this->identifier, $this->color);
    }
}
