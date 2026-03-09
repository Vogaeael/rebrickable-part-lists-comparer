<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Model\LDCadPart;

class LDCadWriter extends AbstractWriter
{
    /**
     * @throws Exception
     */
    public function writePart(array $parts): void
    {
        $content = '[options]' . PHP_EOL;
        $content .= 'kind=basic' . PHP_EOL;
        $content .= 'caption=result' . PHP_EOL;
        $content .= 'sortOn=description' . PHP_EOL . PHP_EOL;
        $content .= '<items>' . PHP_EOL;
        foreach ($parts as $part) {
            $this->checkClass->checkClass($part, LDCadPart::class);
            if ($part->getQuantity() === 0) {
                continue;
            }

            /** @var LDCadPart $part */
            $content .= $part->getIdentifier() . '.dat:';
            $content .= '[sourceInv=' . $part->getSourceInv() . '] ';
            $content .= '[color=' . $part->getColor() . '] ';
            $content .= '[count=' . $part->getQuantity() . ']' . PHP_EOL;
        }

        file_put_contents('data/ldcad-result.pbg', $content);
    }
}
