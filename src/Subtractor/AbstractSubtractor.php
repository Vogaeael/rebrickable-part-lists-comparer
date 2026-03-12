<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Subtractor;

use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

abstract class AbstractSubtractor implements PartSubtractor
{
    public function __construct(
        protected CheckClass $checkClass
    ) {
    }

    abstract public function subtract(Part $partMinuend, ?Part $partSubtrahend): Part;
}
