<?php declare(strict_types=1);

namespace Vogaeael\tests\Loader;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Loader\BrickStoreBSXLoader;
use Vogaeael\RebrickablePartListsComparer\Model\BrickStoreBSXPart;

class BrickStoreBSXLoaderTest extends TestCase
{
    public function testDoesFileExistOrException(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('File not found: fileDoesNotExist.txt');

        $load = new BrickStoreBSXLoader();
        $load->load('fileDoesNotExist.txt');
    }

    public function testLoad(): void
    {
        $loader = new BrickStoreBSXLoader();
        $actual = $loader->load(__DIR__ . '/../data/brickstore_parts.bsx');

        $this->assertIsArray($actual);
        $this->assertCount(3, $actual);

        $part = new BrickStoreBSXPart('P', '99781', '86', 1);
        $this->assertContainsEquals($part, $actual);

        $part = new BrickStoreBSXPart('P', '6112', '11', 2);
        $this->assertContainsEquals($part, $actual);

        $part = new BrickStoreBSXPart('P', '3010', '17', 14);
        $this->assertContainsEquals($part, $actual);
    }
}
