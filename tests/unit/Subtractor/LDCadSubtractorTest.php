<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Subtractor;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\LDCadPart;
use Vogaeael\RebrickablePartListsComparer\Subtractor\LDCadSubtractor;
use Vogaeael\RebrickablePartListsComparer\tests\unit\Model\EqualsDecorator\LDCadPartEqualsDecorator;

final class LDCadSubtractorTest extends TestCase
{
    #[DataProviderExternal(SubtractorTestQuantityProvider::class, 'quantityProvider')]
    public function testSubtract(int $quantityMinuend, int $quantitySubtrahend, int $quantityResult): void
    {
        $partMinuend = new LDCadPart('identifierMinuend', 'colorMinuend', 'sourceInvMinuend', $quantityMinuend);
        $partSubtrahend = new LDCadPart('identifierSubtrahend', 'colorSubtrahend', 'sourceInvSubtrahend', $quantitySubtrahend);
        $subtractor = new LDCadSubtractor(new CheckClass());

        $expected = new LDCadPart('identifierMinuend', 'colorMinuend', 'sourceInvMinuend', $quantityResult);
        $actual = $subtractor->subtract($partMinuend, $partSubtrahend);
        $this->assertObjectEquals($expected, new LDCadPartEqualsDecorator($actual));
    }
}
