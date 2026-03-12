<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Subtractor;

use PHPUnit\Framework\TestCase;

class AbstractSubtractorTest extends TestCase
{
    public static function quantityProvider(): array
    {
        return[
            [
                'quantityMinuend' => 6,
                'quantitySubtrahend' => 2,
                'quantityResult' => 4,
            ],
            [
                'quantityMinuend' => 20,
                'quantitySubtrahend' => 5,
                'quantityResult' => 15,
            ],
            [
                'quantityMinuend' => 122,
                'quantitySubtrahend' => 122,
                'quantityResult' => 0,
            ],
            [
                'quantityMinuend' => 10,
                'quantitySubtrahend' => 82,
                'quantityResult' => 0,
            ]
        ];
    }
}
