<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2025 Andreas Möller
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
 * @covers \Ergebnis\Json\Exception\FileDoesNotContainJson
 */
final class FileDoesNotContainJsonTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testFileReturnsException(): void
    {
        $name = __FILE__;

        $exception = Exception\FileDoesNotContainJson::file($name);

        $expected = \sprintf(
            'File "%s" does not contain a valid JSON string.',
            $name,
        );

        self::assertSame($expected, $exception->getMessage());
    }
}
