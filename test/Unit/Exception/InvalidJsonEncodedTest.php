<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/json
 */

namespace Ergebnis\Json\Test\Unit\Exception;

use Ergebnis\Json\Exception;
use Ergebnis\Json\Test;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Json\Exception\InvalidJsonEncoded
 */
final class InvalidJsonEncodedTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testDefaults(): void
    {
        $exception = new Exception\InvalidJsonEncoded();

        self::assertSame('', $exception->encoded());
    }

    public function testFromEncodedReturnsInvalidJsonEncodedException(): void
    {
        $encoded = self::faker()->sentence();

        $exception = Exception\InvalidJsonEncoded::fromEncoded($encoded);

        $message = \sprintf(
            '"%s" is not valid JSON.',
            $encoded,
        );

        self::assertSame($message, $exception->getMessage());
        self::assertSame($encoded, $exception->encoded());
    }
}
