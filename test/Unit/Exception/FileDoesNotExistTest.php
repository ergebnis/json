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

use Ergebnis\Json;
use PHPUnit\Framework;

/**
 * @covers \Ergebnis\Json\Exception\FileDoesNotExist
 */
final class FileDoesNotExistTest extends Framework\TestCase
{
    use Json\Test\Util\Helper;

    public function testFileReturnsException(): void
    {
        $name = __FILE__;

        $exception = Json\Exception\FileDoesNotExist::file($name);

        $expected = \sprintf(
            'File "%s" does not exist.',
            $name,
        );

        self::assertSame($expected, $exception->getMessage());
    }
}
