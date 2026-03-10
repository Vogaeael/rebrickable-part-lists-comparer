<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\Part;

interface PartWriter
{
    /**
     * @param Part[] $parts
     *
     * @throws Exception
     */
    public function writePart(array $parts, string $filePath): void;
}
