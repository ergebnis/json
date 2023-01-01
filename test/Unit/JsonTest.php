<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2023 Andreas Möller
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
 * @uses \Ergebnis\Json\Exception\FileDoesNotContainJson
 * @uses \Ergebnis\Json\Exception\FileDoesNotExist
 * @uses \Ergebnis\Json\Exception\NotJson
 */
final class JsonTest extends Framework\TestCase
{
    use Test\Util\Helper;

    public function testFromStringThrowsWhenValueIsNotJson(): void
    {
        $encoded = <<<'TXT'
{
  "foo
TXT;

        $this->expectException(Exception\NotJson::class);

        Json::fromString($encoded);
    }

    /**
     * @dataProvider \Ergebnis\Json\Test\DataProvider\JsonProvider::validString()
     */
    public function testFromStringReturnsJsonWhenValueIsValidJson(string $encoded): void
    {
        $json = Json::fromString($encoded);

        self::assertSame($encoded, $json->toString());
        self::assertSame($encoded, $json->encoded());

        $decoded = \json_decode(
            $encoded,
            false,
            512,
            \JSON_THROW_ON_ERROR,
        );

        self::assertEquals($decoded, $json->decoded());
    }

    public function testFromFileThrowsWhenFileDoesNotExist(): void
    {
        $file = __DIR__ . '/../Fixture/Json/does-not-exist.json';

        $this->expectException(Exception\FileDoesNotExist::class);

        Json::fromFile($file);
    }

    public function testFromFileThrowsWhenFileIsADirectory(): void
    {
        $file = __DIR__ . '/../Fixture/Json';

        $this->expectException(Exception\FileDoesNotExist::class);

        Json::fromFile($file);
    }

    public function testFromFileThrowsWhenFileDoesNotContainValidJson(): void
    {
        $file = __DIR__ . '/../Fixture/Json/not-valid/object.json';

        $this->expectException(Exception\FileDoesNotContainJson::class);

        Json::fromFile($file);
    }

    /**
     * @dataProvider \Ergebnis\Json\Test\DataProvider\JsonProvider::validFile()
     */
    public function testFromFileReturnsJsonWhenFileContainsValidJson(string $file): void
    {
        $json = Json::fromFile($file);

        self::assertStringEqualsFile($file, $json->toString());
        self::assertStringEqualsFile($file, $json->encoded());

        $decoded = \json_decode(
            \file_get_contents($file),
            false,
            512,
            \JSON_THROW_ON_ERROR,
        );

        self::assertEquals($decoded, $json->decoded());
    }
}
