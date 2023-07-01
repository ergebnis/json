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

namespace Ergebnis\Json;

/**
 * @psalm-immutable
 */
final class Json
{
    /**
     * @param null|array<int, mixed>|bool|float|int|object|string $decoded
     */
    private function __construct(
        private readonly string $encoded,
        private $decoded,
    ) {
    }

    /**
     * @throws Exception\NotJson
     */
    public static function fromString(string $encoded): self
    {
        try {
            $decoded = self::decode($encoded);
        } catch (\JsonException) {
            throw Exception\NotJson::value($encoded);
        }

        return new self(
            $encoded,
            $decoded,
        );
    }

    /**
     * @throws Exception\FileCanNotBeRead
     * @throws Exception\FileDoesNotContainJson
     * @throws Exception\FileDoesNotExist
     */
    public static function fromFile(string $file): self
    {
        if (!\is_file($file)) {
            throw Exception\FileDoesNotExist::file($file);
        }

        $encoded = \file_get_contents($file);

        if (!\is_string($encoded)) {
            throw Exception\FileCanNotBeRead::file($file);
        }

        try {
            $decoded = self::decode($encoded);
        } catch (\JsonException) {
            throw Exception\FileDoesNotContainJson::file($file);
        }

        return new self(
            $encoded,
            $decoded,
        );
    }

    /**
     * Returns the decoded JSON value.
     *
     * @return null|array<int, mixed>|bool|float|int|object|string
     */
    public function decoded()
    {
        return $this->decoded;
    }

    /**
     * Returns the original JSON value.
     */
    public function encoded(): string
    {
        return $this->encoded;
    }

    /**
     * Returns the original JSON value.
     */
    public function toString(): string
    {
        return $this->encoded;
    }

    /**
     * @throws \JsonException
     */
    private static function decode(string $encoded): mixed
    {
        return \json_decode(
            $encoded,
            false,
            512,
            \JSON_THROW_ON_ERROR,
        );
    }
}
