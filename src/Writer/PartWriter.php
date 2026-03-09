<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

interface PartWriter
{
    public function writePart(array $parts): void;
}
