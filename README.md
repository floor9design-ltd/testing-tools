# testing-tools

[![Latest Version](https://img.shields.io/github/v/release/floor9design-ltd/testing-tools?include_prereleases&style=plastic)](https://github.com/floor9design-ltd/testing-tools/releases)
[![Packagist](https://img.shields.io/packagist/v/floor9design/testing-tools?style=plastic)](https://packagist.org/packages/floor9design/testing-tools)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=plastic)](LICENCE.md)

[![Build Status](https://img.shields.io/travis/floor9design-ltd/testing-tools?style=plastic)](https://travis-ci.com/github/floor9design-ltd/testing-tools)
[![Build Status](https://img.shields.io/codecov/c/github/floor9design-ltd/testing-tools?style=plastic)](https://codecov.io/gh/floor9design-ltd/testing-tools)

[![Github Downloads](https://img.shields.io/github/downloads/floor9design-ltd/testing-tools/total?style=plastic)](https://github.com/floor9design-ltd/testing-tools)
[![Packagist Downloads](https://img.shields.io/packagist/dt/floor9design/testing-tools?style=plastic)](https://packagist.org/packages/floor9design/testing-tools)


## Introduction

This offers a set of easy testing tools useful for generating unit testing in PHPUnit.

## Features

* Easy installation
* Simple and efficient classes

## Install

Via Composer

``` bash
composer require floor9design/testing-tools
```

## Usage

* [usage](docs/project/usage.md)

## Setup

These are a simple classes, so minimal setup is required. In a composer/PSR compliant system, this should be 
automatically included. If your system works another way, this can be manually included.

Note that they are namespaced, so should not clash with your other classes/methods.

## Testing

To run the tests: 

* `./vendor/phpunit/phpunit/phpunit`

Documentation and coverage can be generated as follows:

* `./vendor/phpunit/phpunit/phpunit --coverage-html docs/tests/`

## Credits

- [Rick](https://github.com/elb98rm)

## Changelog

A changelog is generated here:

* [Change log](CHANGELOG.md)

## License

* [MIT](LICENCE.md)