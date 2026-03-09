<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

abstract class AbstractWriter implements PartWriter
{
    abstract public function writePart(array $parts): void;

    /**
     * @throws Exception
     */
    protected function checkClassType(Part $part, string $class): void
    {
        if (!($part instanceof $class)) {
            throw new Exception(sprintf('Part with key `%s` not of type %s.', $part->generateKey(), $class));
        }
    }
}
