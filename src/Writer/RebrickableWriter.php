<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart;

class RebrickableWriter extends AbstractWriter
{
    /**
     * @throws Exception
     */
    public function writePart(array $parts): void
    {
        $fp = fopen('lego_pab-result.csv', 'w+');
        fputcsv($fp, ['Part', 'Color', 'Quantity', 'Is Spare'], ",", "");
        foreach ($parts as $part) {
            $this->checkClassType($part, RebrickablePart::class);

            /** @var RebrickablePart $part */
            if ($part->getQuantity() !== 0) {
                fputcsv($fp, [$part->getPart(), $part->getColor(), $part->getQuantity(), 'False'], ",", "");
            }
            if ($part->getSpareQuantity() !== 0) {
                fputcsv($fp, [$part->getPart(), $part->getColor(), $part->getSpareQuantity(), 'True'], ",", "");
            }
        }

        fclose($fp);
    }
}
