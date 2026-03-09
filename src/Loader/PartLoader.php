<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Loader;

interface PartLoader
{
    public function load(string $filePath): array;
}
