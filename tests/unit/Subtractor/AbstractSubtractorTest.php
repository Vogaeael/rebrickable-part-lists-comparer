<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Subtractor;

use PHPUnit\Framework\TestCase;

class AbstractSubtractorTest extends TestCase
{
    public static function quantityProvider(): array
    {
        return[
            [
                'quantityA' => 6,
                'quantityB' => 2,
                'quantityResult' => 4,
            ],
            [
                'quantityA' => 20,
                'quantityB' => 5,
                'quantityResult' => 15,
            ],
            [
                'quantityA' => 122,
                'quantityB' => 122,
                'quantityResult' => 0,
            ],
            [
                'quantityA' => 10,
                'quantityB' => 82,
                'quantityResult' => 0,
            ]
        ];
    }
}
