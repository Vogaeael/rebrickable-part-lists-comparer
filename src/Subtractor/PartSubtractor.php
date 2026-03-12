<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Vogaeael\RebrickablePartListsComparer\Model\Part;

interface PartSubtractor
{
    public function subtract(Part $partMinuend, ?Part $partSubtrahend): Part;
}
