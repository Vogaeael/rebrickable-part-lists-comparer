<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;

abstract class AbstractWriter implements PartWriter
{
    public function __construct(
        protected CheckClass $checkClass
    ) {
    }

    /**
     * @inheritDoc
     */
    abstract public function writePart(array $parts, string $filePath): void;
}
