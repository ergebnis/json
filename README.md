# json

[![Integrate](https://github.com/ergebnis/json/workflows/Integrate/badge.svg)](https://github.com/ergebnis/json/actions)
[![Prune](https://github.com/ergebnis/json/workflows/Prune/badge.svg)](https://github.com/ergebnis/json/actions)
[![Release](https://github.com/ergebnis/json/workflows/Release/badge.svg)](https://github.com/ergebnis/json/actions)
[![Renew](https://github.com/ergebnis/json/workflows/Renew/badge.svg)](https://github.com/ergebnis/json/actions)

[![Code Coverage](https://codecov.io/gh/ergebnis/json/branch/main/graph/badge.svg)](https://codecov.io/gh/ergebnis/json)
[![Type Coverage](https://shepherd.dev/github/ergebnis/json/coverage.svg)](https://shepherd.dev/github/ergebnis/json)

[![Latest Stable Version](https://poser.pugx.org/ergebnis/json/v/stable)](https://packagist.org/packages/ergebnis/json)
[![Total Downloads](https://poser.pugx.org/ergebnis/json/downloads)](https://packagist.org/packages/ergebnis/json)

Provides a `Json` value object for representing a valid JSON `string`.

## Installation

Run

```sh
composer require ergebnis/json
```

## Usage

### Create a `Json` object from `string`

Create a `Json` object from a `string`:

```php
<?php

declare(strict_types=1);

use Ergebnis\Json;

$encoded = <<<TXT
{
  "foo
TXT;

$json = Json\Json::fromEncoded($encoded); // throws Json\Exception\InvalidJsonEncoded
```

Create a `Json` object from a valid JSON `string`:

```php
<?php

declare(strict_types=1);

use Ergebnis\Json;

$encoded = <<<JSON
{
  "foo": "bar"
}
JSON;

$json = Json\Json::fromEncoded($encoded); // instance of Json\Json
```

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](https://github.com/ergebnis/.github/blob/main/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.

Please have a look at [`LICENSE.md`](LICENSE.md).

## Curious what I am up to?

Follow me on [Twitter](https://twitter.com/localheinz)!
