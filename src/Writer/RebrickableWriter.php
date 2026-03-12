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
        /* Put the header via file_put_contents because fputcsv doesn't allow empty enclosure.
         * We want it as near to the original as possible and that doesn't have the `Is Spare` in enclosure.
         *
         * fputcsv($fp, ['Part', 'Color', 'Quantity', 'Is Spare'], ",", "", "");
         */
        file_put_contents($filePath, 'Part,Color,Quantity,Is Spare' . PHP_EOL);

        $fp = fopen($filePath, 'a+');
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
