<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2026 Andreas Möller
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
 * @covers \Ergebnis\Json\Exception\NotJson
 */
final class NotJsonTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testValueReturnsException(): void
    {
        $encoded = self::faker()->sentence();

        $exception = Exception\NotJson::value($encoded);

        $message = \sprintf(
            'Value "%s" is not a valid JSON string.',
            $encoded,
        );

        self::assertSame($message, $exception->getMessage());
    }
}
