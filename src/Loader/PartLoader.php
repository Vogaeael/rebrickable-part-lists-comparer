<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Loader;

use Vogaeael\RebrickablePartListsComparer\Model\Part;

interface PartLoader
{
    /**
     * @return array<string, Part>
     */
    public function load(string $filePath): array;
}
