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

namespace Ergebnis\Json;

final class Example
{
    private string $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function fromName(string $name): self
    {
        return new self($name);
    }

    public function name(): string
    {
        return $this->name;
    }
}
