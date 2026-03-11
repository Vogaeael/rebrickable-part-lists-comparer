<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Subtractor;

use PHPUnit\Framework\Attributes\DataProvider;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\BrickLinkPart;
use Vogaeael\RebrickablePartListsComparer\Subtractor\BrickLinkSubtractor;
use Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator\BrickLinkPartEqualsDecorator;

class BrickLinkSubtractorTest extends AbstractSubtractorTest
{
    #[DataProvider('quantityProvider')]
    public function testSubtract(int $quantityA, int $quantityB, int $quantityResult): void
    {
        $partA = new BrickLinkPart('itemTypeA', 'itemIdA', 'colorIdA', $quantityA);
        $partB = new BrickLinkPart('itemTypeB', 'itemIdB', 'colorIdB', $quantityB);
        $subtractor = new BrickLinkSubtractor(new CheckClass());

        $expected = new BrickLinkPart('itemTypeA', 'itemIdA', 'colorIdA', $quantityResult);
        $actual = $subtractor->subtract($partA, $partB);
        $this->assertObjectEquals($expected, new BrickLinkPartEqualsDecorator($actual));
    }
}
