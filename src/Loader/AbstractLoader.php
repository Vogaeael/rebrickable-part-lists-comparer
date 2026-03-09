<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Loader;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Loader\PartLoader;

abstract class AbstractLoader implements PartLoader
{
    abstract public function load(string $filePath): array;

    /**
     * @throws Exception
     */
    protected function doesFileExistOrException(string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new Exception('File not found: ' . $filePath);
        }
    }
}
