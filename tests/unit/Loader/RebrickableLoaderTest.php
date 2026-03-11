<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Loader;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Loader\RebrickableLoader;
use Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart;

class RebrickableLoaderTest extends TestCase
{
    public function testDoesFileExistOrException(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('File not found: fileDoesNotExist.txt');

        $load = new RebrickableLoader();
        $load->load('fileDoesNotExist.txt');
    }

    public function testLoad(): void
    {
        $loader = new RebrickableLoader();
        $actual = $loader->load(__DIR__ . '/../../data/rebrickable_parts.csv');

        $this->assertIsArray($actual);
        $this->assertCount(3, $actual);

        $part = new RebrickablePart('99781', '0', 1, 0);
        $this->assertContainsEquals($part, $actual);

        $part = new RebrickablePart('970c27pr0039', '72', 2, 0  );
        $this->assertContainsEquals($part, $actual);

        $part = new RebrickablePart('6141', '11', 14, 2);
        $this->assertContainsEquals($part, $actual);
    }
}
