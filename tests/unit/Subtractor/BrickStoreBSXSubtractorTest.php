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
    public function testSubtract(int $quantityMinuend, int $quantitySubtrahend, int $quantityResult): void
    {
        $partMinuend = new BrickStoreBSXPart('itemTypeIdMinuend', 'itemIdMinuend', 'colorIdMinuend', $quantityMinuend);
        $partSubtrahend = new BrickStoreBSXPart('itemTypeIdSubtrahend', 'itemIdSubtrahend', 'colorIdSubtrahend', $quantitySubtrahend);
        $subtractor = new BrickStoreBSXSubtractor(new CheckClass());

        $expected = new BrickStoreBSXPart('itemTypeIdMinuend', 'itemIdMinuend', 'colorIdMinuend', $quantityResult);
        $actual = $subtractor->subtract($partMinuend, $partSubtrahend);
        $this->assertObjectEquals($expected, new BrickStoreBSXEqualsDecorator($actual));
    }
}
