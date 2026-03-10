<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Loader;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\LegoPickABrickPart;

class LegoPickABrickLoader extends AbstractLoader
{

    /**
     * @inheritDoc
     */
    public function load(string $filePath): array
    {
        $this->doesFileExistOrException($filePath);

        $parts = [];
        $ignoredFirstLine = false;
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (!$ignoredFirstLine) {
                    $ignoredFirstLine = true;
                    continue;
                }

                $parts[] = new LegoPickABrickPart($data[0], $data[1]);
            }
            fclose($handle);

            return $parts;
        }

        throw new Exception('Could not read file: ' . $filePath);
    }
}
