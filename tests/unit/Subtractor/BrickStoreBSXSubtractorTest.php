<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Subtractor;

use PHPUnit\Framework\Attributes\DataProvider;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\BrickStoreBSXPart;
use Vogaeael\RebrickablePartListsComparer\Subtractor\BrickStoreBSXSubtractor;
use Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator\BrickStoreBSXEqualsDecorator;

class BrickStoreBSXSubtractorTest extends AbstractSubtractorTest
{
    #[DataProvider('quantityProvider')]
    public function testSubtract(int $quantityA, int $quantityB, int $quantityResult): void
    {
        $partA = new BrickStoreBSXPart('itemTypeIdA', 'itemIdA', 'colorIdA', $quantityA);
        $partB = new BrickStoreBSXPart('itemTypeIdB', 'itemIdB', 'colorIdB', $quantityB);
        $subtractor = new BrickStoreBSXSubtractor(new CheckClass());

        $expected = new BrickStoreBSXPart('itemTypeIdA', 'itemIdA', 'colorIdA', $quantityResult);
        $actual = $subtractor->subtract($partA, $partB);
        $this->assertObjectEquals($expected, new BrickStoreBSXEqualsDecorator($actual));
    }
}
