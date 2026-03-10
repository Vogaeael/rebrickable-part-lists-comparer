<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Writer;

use Vogaeael\RebrickablePartListsComparer\Model\LDCadPart;

class LDCadWriter extends AbstractWriter
{
    /**
     * @inheritDoc
     */
    public function writePart(array $parts, string $filePath): void
    {
        $content = '[options]' . PHP_EOL;
        $content .= 'kind=basic' . PHP_EOL;
        $content .= 'caption=result' . PHP_EOL;
        $content .= 'sortOn=description' . PHP_EOL . PHP_EOL;
        $content .= '<items>' . PHP_EOL;
        foreach ($parts as $part) {
            $this->checkClass->checkClass($part, LDCadPart::class);
            if ($part->quantity === 0) {
                continue;
            }

            /** @var LDCadPart $part */
            $content .= $part->identifier . '.dat:';
            $content .= '[sourceInv=' . $part->sourceInv . '] ';
            $content .= '[color=' . $part->color . '] ';
            $content .= '[count=' . $part->quantity . ']' . PHP_EOL;
        }

        file_put_contents($filePath, $content);
    }
}
