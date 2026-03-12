<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Vogaeael\RebrickablePartListsComparer\Model\InterfaceRebrickablePart;

class RebrickableWriter extends AbstractWriter
{
    /**
     * @inheritDoc
     */
    public function writePart(array $parts, string $filePath): void
    {
        $fp = fopen($filePath, 'w+');
        fputcsv($fp, ['Part', 'Color', 'Quantity', 'Is Spare'], ",", '"', "");
        foreach ($parts as $part) {
            $this->checkClass->checkClass($part, InterfaceRebrickablePart::class);

            /** @var InterfaceRebrickablePart $part */
            if ($part->quantity !== 0) {
                fputcsv($fp, [$part->part, $part->color, $part->quantity, 'False'], ",", '"', "");
            }
            if ($part->spareQuantity !== 0) {
                fputcsv($fp, [$part->part, $part->color, $part->spareQuantity, 'True'], ",", '"', "");
            }
        }

        fclose($fp);
    }
}
