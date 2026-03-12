<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Subtractor;

use PHPUnit\Framework\Attributes\DataProvider;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart;
use Vogaeael\RebrickablePartListsComparer\Subtractor\RebrickableSubtractor;
use Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator\RebrickablePartEqualsDecorator;

class RebrickableSubtractorTest extends AbstractSubtractorTest
{
    #[DataProvider('quantityProvider')]
    public function testSubtract(int $quantityMinuend, int $quantitySubtrahend, int $quantityResult): void
    {
        $partMinuend = new RebrickablePart('partMinuend', 'colorMinuend', $quantityMinuend, 0);
        $partSubtrahend = new RebrickablePart('partSubtrahend', 'colorSubtrahend', $quantitySubtrahend, 0);
        $subtractor = new RebrickableSubtractor(new CheckClass());

        $expected = new RebrickablePart('partMinuend', 'colorMinuend', $quantityResult, 0);
        $actual = $subtractor->subtract($partMinuend, $partSubtrahend);
        $this->assertObjectEquals($expected, new RebrickablePartEqualsDecorator($actual));
    }

    #[DataProvider('quantityProvider')]
    public function testSubtractSpareQuantity(int $quantityMinuend, int $quantitySubtrahend, int $quantityResult): void
    {
        $partMinuend = new RebrickablePart('partMinuend', 'colorMinuend', 0, $quantityMinuend);
        $partSubtrahend = new RebrickablePart('partSubtrahend', 'colorSubtrahend', 0, $quantitySubtrahend);
        $subtractor = new RebrickableSubtractor(new CheckClass());

        $expected = new RebrickablePart('partMinuend', 'colorMinuend', 0, $quantityResult);
        $actual = $subtractor->subtract($partMinuend, $partSubtrahend);
        $this->assertObjectEquals($expected, new RebrickablePartEqualsDecorator($actual));
    }
}
