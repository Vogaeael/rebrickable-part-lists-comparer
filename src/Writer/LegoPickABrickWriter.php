<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\LegoPickABrickPart;

class LegoPickABrickWriter extends AbstractWriter
{
    /**
     * @throws Exception
     */
    public function writePart(array $parts): void
    {
        $fp = fopen('lego_pab-result.csv', 'w+');
        fputcsv($fp, ['elementId', 'quantity'], ",", "");
        foreach ($parts as $part) {
            $this->checkClass->checkClass($part, LegoPickABrickPart::class);
            if ($part->getQuantity() === 0) {
                continue;
            }

            /** @var LegoPickABrickPart $part */
            fputcsv($fp, [$part->getElementId(), $part->getQuantity()], ",", "");
        }

        fclose($fp);
    }
}
