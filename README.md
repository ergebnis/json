# json

[![Integrate](https://github.com/ergebnis/json/actions/workflows/integrate.yaml/badge.svg?branch=main)](https://github.com/ergebnis/json/actions/workflows/integrate.yaml)
[![Merge](https://github.com/ergebnis/json/actions/workflows/merge.yaml/badge.svg)](https://github.com/ergebnis/json/actions/workflows/merge.yaml)
[![Release](https://github.com/ergebnis/json/actions/workflows/release.yaml/badge.svg)](https://github.com/ergebnis/json/actions/workflows/release.yaml)
[![Renew](https://github.com/ergebnis/json/actions/workflows/renew.yaml/badge.svg)](https://github.com/ergebnis/json/actions/workflows/renew.yaml)

[![Code Coverage](https://codecov.io/gh/ergebnis/json/branch/main/graph/badge.svg)](https://codecov.io/gh/ergebnis/json)

[![Latest Stable Version](https://poser.pugx.org/ergebnis/json/v/stable)](https://packagist.org/packages/ergebnis/json)
[![Total Downloads](https://poser.pugx.org/ergebnis/json/downloads)](https://packagist.org/packages/ergebnis/json)
[![Monthly Downloads](https://poser.pugx.org/ergebnis/json/d/monthly)](https://packagist.org/packages/ergebnis/json)

This project provides a [`composer`](https://getcomposer.org) package with a `Json` value object for representing a valid JSON `string`.

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

$json = Json\Json::fromString($encoded); // throws Json\Exception\NotJson
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

$json = Json\Json::fromString($encoded); // instance of Json\Json
```

### Create a `Json` object from a file

Create a `Json` object from a file that does not exist:

```php
<?php

declare(strict_types=1);

use Ergebnis\Json;

$json = Json\Json::fromFile(__DIR__ . '/does-not-exist.json'); // throws Json\Exception\FileDoesNotExist
```

Create a `Json` object from a file that can not be read:

```php
<?php

declare(strict_types=1);

use Ergebnis\Json;

$json = Json\Json::fromFile(__DIR__ . '/can-not-be-read.json'); // throws Json\Exception\FileCanNotBeRead
```

Create a `Json` object from a file that does not contain a valid JSON `string`:

```php
<?php

declare(strict_types=1);

use Ergebnis\Json;

$json = Json\Json::fromFile(__DIR__ . '/README.MD'); // throws Json\Exception\FileDoesNotContainJson
```

Create a `Json` object from a file that contains a valid JSON `string`:

```php
<?php

declare(strict_types=1);

use Ergebnis\Json;

$json = Json\Json::fromFile(__DIR__ . '/contains-json.json'); // instance of Json\Json
```

## Changelog

The maintainers of this project record notable changes to this project in a [changelog](CHANGELOG.md).

## Contributing

The maintainers of this project suggest following the [contribution guide](.github/CONTRIBUTING.md).

## Code of Conduct

The maintainers of this project ask contributors to follow the [code of conduct](https://github.com/ergebnis/.github/blob/main/CODE_OF_CONDUCT.md).

## General Support Policy

The maintainers of this project provide limited support.

You can support the maintenance of this project by [sponsoring @ergebnis](https://github.com/sponsors/ergebnis).

## PHP Version Support Policy

This project supports PHP versions with [active and security support](https://www.php.net/supported-versions.php).

The maintainers of this project add support for a PHP version following its initial release and drop support for a PHP version when it has reached the end of security support.

## Security Policy

This project has a [security policy](.github/SECURITY.md).

## License

This project uses the [MIT license](LICENSE.md).

## Social

Follow [@localheinz](https://twitter.com/intent/follow?screen_name=localheinz) and [@ergebnis](https://twitter.com/intent/follow?screen_name=ergebnis) on Twitter.
