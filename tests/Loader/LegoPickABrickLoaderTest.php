<?php declare(strict_types=1);

namespace Vogaeael\tests\Loader;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Loader\LegoPickABrickLoader;
use Vogaeael\RebrickablePartListsComparer\Model\LegoPickABrickPart;

class LegoPickABrickLoaderTest extends TestCase
{
    public function testDoesFileExistOrException(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('File not found: fileDoesNotExist.txt');

        $load = new LegoPickABrickLoader();
        $load->load('fileDoesNotExist.txt');
    }

    public function testLoad(): void
    {
        $loader = new LegoPickABrickLoader();
        $actual = $loader->load(__DIR__ . '/../data/lego_pab_parts.csv');

        $this->assertIsArray($actual);
        $this->assertCount(3, $actual);

        $part = new LegoPickABrickPart('6016172', 12);
        $this->assertContainsEquals($part, $actual);

        $part = new LegoPickABrickPart('611226', 2);
        $this->assertContainsEquals($part, $actual);

        $part = new LegoPickABrickPart('301026', 4);
        $this->assertContainsEquals($part, $actual);
    }
}
