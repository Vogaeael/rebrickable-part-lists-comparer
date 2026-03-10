<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Vogaeael\RebrickablePartListsComparer\Model\LegoPickABrickPart;

class LegoPickABrickWriter extends AbstractWriter
{
    /**
     * @inheritDoc
     */
    public function writePart(array $parts, string $filePath): void
    {
        $fp = fopen($filePath, 'w+');
        fputcsv($fp, ['elementId', 'quantity'], ",", "");
        foreach ($parts as $part) {
            $this->checkClass->checkClass($part, LegoPickABrickPart::class);
            if ($part->quantity === 0) {
                continue;
            }

            /** @var LegoPickABrickPart $part */
            fputcsv($fp, [$part->elementId, $part->quantity], ",", "");
        }

        fclose($fp);
    }
}
