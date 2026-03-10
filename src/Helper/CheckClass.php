<?php

namespace Vogaeael\RebrickablePartListsComparer\Helper;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

class CheckClass
{
    /**
     * @throws Exception
     */
    public function checkClass(Part $part, string $class): void
    {
        if (!($part instanceof $class)) {
            throw new Exception(sprintf('Part with key `%s` is not of class %s', $part->generateKey(), $class));
        }
    }
}
