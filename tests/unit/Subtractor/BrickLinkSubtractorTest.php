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
    public function testSubtract(int $quantityMinuend, int $quantitySubtrahend, int $quantityResult): void
    {
        $partMinuend = new BrickLinkPart('itemTypeMinuend', 'itemIdMinuend', 'colorIdMinuend', $quantityMinuend);
        $partSubtrahend = new BrickLinkPart('itemTypeSubtrahend', 'itemIdSubtrahend', 'colorIdSubtrahend', $quantitySubtrahend);
        $subtractor = new BrickLinkSubtractor(new CheckClass());

        $expected = new BrickLinkPart('itemTypeMinuend', 'itemIdMinuend', 'colorIdMinuend', $quantityResult);
        $actual = $subtractor->subtract($partMinuend, $partSubtrahend);
        $this->assertObjectEquals($expected, new BrickLinkPartEqualsDecorator($actual));
    }
}
