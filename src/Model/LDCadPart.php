<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Model;

class LDCadPart extends AbstractPart
{
    private(set) string $identifier {
        get {
            return $this->identifier;
        }
    }

    private(set) string $color {
        get {
            return $this->color;
        }
    }

    private(set) string $sourceInv {
        get {
            return $this->sourceInv;
        }
    }

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

    public function generateKey(): string
    {
        return sprintf('i:%s-c:%s', $this->identifier, $this->color);
    }
}
