<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\integration;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Types;

final class CompareFilesTest extends TestCase
{
    public function testCompareFiles(): void
    {
        $filePathMinuend = __DIR__ . '/../data/rebrickable_parts_minuend.csv';
        $filePathSubtrahend = __DIR__ . '/../data/rebrickable_parts.csv';

        $filePathResult = __DIR__ . '/../data/write/integration_rebrickable_parts_script_result.csv';

        $scriptFile = __DIR__ . '/../../src/compareFiles.php';
        shell_exec(sprintf('php %s %s %s %s %s', $scriptFile, Types::Rebrickable->value, $filePathMinuend, $filePathSubtrahend, $filePathResult));

        $expected = 'Part,Color,Quantity,Is Spare' . PHP_EOL;
        $expected .= '99781,0,2,False' . PHP_EOL;
        $expected .= '970c27pr0039,7,3,False' . PHP_EOL;
        $expected .= '6141,11,2,False' . PHP_EOL;

        $this->assertEquals($expected, file_get_contents($filePathResult));

        unlink($filePathResult);
    }
}
