<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Subtractor;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\LegoPickABrickPart;
use Vogaeael\RebrickablePartListsComparer\Subtractor\LegoPickABrickSubtractor;
use Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator\LegoPickABrickPartEqualsDecorator;

final class LegoPickABrickSubtractorTest extends TestCase
{
    #[DataProviderExternal(SubtractorTestQuantityProvider::class, 'quantityProvider')]
    public function testSubtract(int $quantityMinuend, int $quantitySubtrahend, int $quantityResult): void
    {
        $partMinuend = new LegoPickABrickPart('elementIdMinuend', $quantityMinuend);
        $partSubtrahend = new LegoPickABrickPart('elementIdSubtrahend', $quantitySubtrahend);
        $subtractor = new LegoPickABrickSubtractor(new CheckClass());

        $expected = new LegoPickABrickPart('elementIdMinuend', $quantityResult);
        $actual = $subtractor->subtract($partMinuend, $partSubtrahend);
        $this->assertObjectEquals($expected, new LegoPickABrickPartEqualsDecorator($actual));
    }
}
