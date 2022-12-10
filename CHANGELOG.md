# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

For a full diff see [`1.0.1...main`][1.0.1...main].

## [`1.0.1`][1.0.1]

For a full diff see [`1.0.0...1.0.1`][1.0.0...1.0.1].

### Fixed

- Decoded JSON `string` to an object, not an associative array, when constructing `Json` from file name ([#3]), by [@localheinz]

## [`1.0.0`][1.0.0]

For a full diff see [`c020e6f...1.0.0`][c020e6f...1.0.0].

### Added

- Imported `Json` from [`ergebnis/json-normalizer`](https://github.com/ergebnis/json-normalizer/tree/3.0.0) ([#1]), by [@localheinz]
- Imported and merged `Json` from [`ergebnis/json-schema-validator`](https://github.com/ergebnis/json-schema-validator/tree/3.2.0) ([#2]), by [@localheinz]

[1.0.0]: https://github.com/ergebnis/json/releases/tag/1.0.0
[1.0.1]: https://github.com/ergebnis/json/releases/tag/1.0.1

[c020e6f...1.0.0]: https://github.com/ergebnis/json/compare/c020e6f...1.0.0
[1.0.0...1.0.1]: https://github.com/ergebnis/json/compare/1.0.0...1.0.1
[1.0.1...main]: https://github.com/ergebnis/json/compare/1.0.1...main

[#1]: https://github.com/ergebnis/json/pull/1
[#2]: https://github.com/ergebnis/json/pull/2
[#3]: https://github.com/ergebnis/json/pull/3

[@localheinz]: https://github.com/localheinz
