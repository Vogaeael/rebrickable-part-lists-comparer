<?php declare(strict_types=1);

namespace Vogaeael\tests\Loader;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Loader\BrickLinkLoader;
use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;

class BrickLinkLoaderTest extends TestCase
{
    public function testLoad(): void
    {
        $loader = new BrickLinkLoader();
        $actual = $loader->load(__DIR__ . '/../data/bricklink_parts.xml');

        $this->assertIsArray($actual);
        $this->assertCount(3, $actual);

        $part = new BrickLinkPart('P', '30357', '86', 1);
        $this->assertContainsEquals($part, $actual);

        $part = new BrickLinkPart('P', '3023', '63', 2);
        $this->assertContainsEquals($part, $actual);

        $part = new BrickLinkPart('P', '75435stk01', '11', 1);
        $this->assertContainsEquals($part, $actual);
    }
}
