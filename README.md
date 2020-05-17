# Laravel Queue Fake

[![Current Release](https://img.shields.io/github/release/ohseesoftware/laravel-queue-fake.svg?style=flat-square)](https://github.com/ohseesoftware/laravel-queue-fake/releases)
![Build Status Badge](https://github.com/ohseesoftware/laravel-queue-fake/workflows/Build/badge.svg)
[![Coverage Status](https://coveralls.io/repos/github/ohseesoftware/laravel-queue-fake/badge.svg?branch=master)](https://coveralls.io/github/ohseesoftware/laravel-queue-fake?branch=master)
[![Maintainability Score](https://img.shields.io/codeclimate/maintainability/ohseesoftware/laravel-queue-fake.svg?style=flat-square)](https://codeclimate.com/github/ohseesoftware/laravel-queue-fake)
[![Downloads](https://img.shields.io/packagist/dt/ohseesoftware/laravel-queue-fake.svg?style=flat-square)](https://packagist.org/packages/ohseesoftware/laravel-queue-fake)
[![MIT License](https://img.shields.io/github/license/ohseesoftware/laravel-queue-fake.svg?style=flat-square)](https://github.com/ohseesoftware/laravel-queue-fake/blob/master/LICENSE)

# Overview

There may be times in your Laravel tests where you want to fake the Queue just for a couple lines, and then revert to the real queue after. This package makes that super simple to do:

```php
// Given

// Queue is real there

// When
QueueFake::wrap(function () use (&$value) {
    // Queue is faked inside this function
});

// Queue is back to normal here
```

# Installation

`composer require ohseesoftware/laravel-queue-fake`

# Usage

Image you need to fake the queue to call your factories to setup your models, but also want to test a job:

```php
// Given
$user = null;
QueueFake::wrap(function () use (&$user) {
    // Queue is faked inside this function
    $user = factory(User::class)->create();
});

// When
// Queue is back to normal so we can dispatch, etc
SomeJob::dispatch($user);

// Then
$this->assertDatabaseHas('some-table', [
    'id' => 1
]);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email security@ohseesoftware.com instead of using the issue tracker.

## Credits

-   [Owen Conti](https://github.com/ohseesoftware)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
