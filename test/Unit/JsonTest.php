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

namespace Ergebnis\Json\Test\Unit;

use Ergebnis\Json\Exception;
use Ergebnis\Json\Json;
use Ergebnis\Json\Test;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Json\Json
 *
 * @uses \Ergebnis\Json\Exception\InvalidJsonEncoded
 */
final class JsonTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testFromEncodedRejectsInvalidEncoded(): void
    {
        $encoded = self::faker()->realText();

        $this->expectException(Exception\InvalidJsonEncoded::class);

        Json::fromEncoded($encoded);
    }

    /**
     * @dataProvider provideEncoded
     */
    public function testFromEncodedReturnsJson(string $encoded): void
    {
        $json = Json::fromEncoded($encoded);

        self::assertSame($encoded, $json->toString());
        self::assertSame($encoded, $json->encoded());
        self::assertSame($encoded, \json_encode($json->decoded()));
    }

    /**
     * @return \Generator<string, array{0: null|array|bool|float|int|string}>
     */
    public function provideEncoded(): \Generator
    {
        $values = [
            'array-indexed' => [
                'foo',
                'bar',
            ],
            'array-associative' => [
                'foo' => 'bar',
            ],
            'bool-false' => false,
            'bool-true' => true,
            'float' => 3.14,
            'int' => 9000,
            'null' => null,
            'string' => 'foo',
        ];

        foreach ($values as $key => $value) {
            yield $key => [
                \json_encode($value),
            ];
        }
    }
}
