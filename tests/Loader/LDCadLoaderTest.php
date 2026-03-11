<?php declare(strict_types=1);

namespace Vogaeael\tests\Loader;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Loader\LDCadLoader;
use Vogaeael\RebrickablePartListsComparer\Model\LDCadPart;

class LDCadLoaderTest extends TestCase
{
    public function testDoesFileExistOrException(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('File not found: fileDoesNotExist.txt');

        $load = new LDCadLoader();
        $load->load('fileDoesNotExist.txt');
    }

    public function testLoad(): void
    {
        $loader = new LDCadLoader();
        $actual = $loader->load(__DIR__ . '/../data/ldcad_parts.pbg');

        $this->assertIsArray($actual);
        $this->assertCount(3, $actual);

        $part = new LDCadPart('99781', '72', 'parts', 5);
        $this->assertContainsEquals($part, $actual);

        $part = new LDCadPart('7504pr0001', '0', 'parts', 2);
        $this->assertContainsEquals($part, $actual);

        $part = new LDCadPart('3010', '15', 'parts', 12);
        $this->assertContainsEquals($part, $actual);
    }
}
