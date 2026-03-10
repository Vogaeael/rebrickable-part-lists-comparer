<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Loader;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\LDCadPart;

class LDCadLoader extends AbstractLoader
{
    private const string PART_REGEX = '/([\da-z]+).dat:\[sourceInv=([a-z]+)] \[color=(\d+)] \[count=(\d+)]/';

    /**
     * @inheritDoc
     */
    public function load(string $filePath): array
    {
        $this->doesFileExistOrException($filePath);

        $content = file_get_contents($filePath);
        if (!$content) {
            throw new Exception('Could not read file: ' . $filePath);
        }

        preg_match_all(self::PART_REGEX, $content, $matches, PREG_SET_ORDER, 0);

        $parts = [];
        foreach ($matches as $match) {
            $part = new LDCadPart($match[1], $match[3], $match[2], (int)$match[4]);
            $parts[$part->generateKey()] = $part;
        }

        return $parts;
    }
}
