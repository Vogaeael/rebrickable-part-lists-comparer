<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Loader;

use Exception;

abstract class AbstractLoader implements PartLoader
{
    /**
     * @inheritDoc
     * @throws Exception
     */
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
