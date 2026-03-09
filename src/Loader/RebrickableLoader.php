<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Loader;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart;

class RebrickableLoader extends AbstractLoader
{

    /**
     * @throws Exception
     */
    public function load(string $filePath): array
    {
        $this->doesFileExistOrException($filePath);

        /** @var RebrickablePart[] $parts */
        $parts = [];
        $ignoredFirstLine = false;
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (!$ignoredFirstLine) {
                    $ignoredFirstLine = true;
                    continue;
                }
                $quantity = 0;
                $spareQuantity = 0;
                if ($data[3] === 'False') {
                    $quantity = $data[2];
                } else {
                    $spareQuantity = $data[2];
                }

                $part = new RebrickablePart($data[0], $data[1], $quantity, $spareQuantity);

                $existing = $parts[$part->generateKey()] ?? null;
                if (!$existing) {
                    $parts[$part->generateKey()] = $part;

                    continue;
                }

                $existing->combine($part);
            }
            fclose($handle);

            return $parts;
        }

        throw new Exception('Could not read file: ' . $filePath);
    }
}
