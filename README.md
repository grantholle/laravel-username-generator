# Generate a random, kid-safe username.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/grantholle/laravel-username-generator.svg?style=flat-square)](https://packagist.org/packages/grantholle/laravel-username-generator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/grantholle/laravel-username-generator/run-tests?label=tests)](https://github.com/grantholle/laravel-username-generator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/grantholle/laravel-username-generator.svg?style=flat-square)](https://packagist.org/packages/grantholle/laravel-username-generator)

Generate a username with flexible configuration options. For now the nouns are animal names.

## Installation

You can install the package via composer:

```bash
composer require grantholle/laravel-username-generator
```

You can optionally publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-username-generator-config"
```

By default, it will generate a username studly case with 1 adjective, 1 noun and no numeric prefix. You can modify the config file with your preferred numbers:

```php
return [
    'adjectives' => 2,
    'nouns' => 1,
    'digits' => 2,
    // The casing leverages Laravel's string helper functions:
    // "lower", "upper", "studly", "kebab", "camel", "snake", "slug"
    'casing' => 'slug',
];
```

## Usage

You can leverage your config setup to generate a username based on those options. Using the above configuration as an example, this would generate a username as `adjective-adjective-noun-##`:

```php
use GrantHolle\UsernameGenerator\Username;

$username = Username::make();
// grave-tame-tiger-60
```

Or, if you want to configure your username on the fly, you can use a fluent API to build your username:

```php
use GrantHolle\UsernameGenerator\Username;

$username = (new Username)
    ->withAdjectiveCount(2)
    ->withNounCount(2)
    ->withDigitCount(4)
    ->withCasing('snake')
    ->generate();
// gentle_wan_chimpanzee_sandpiper8828
```

## Command

This also comes with a `make:username` command to generate a username from the command line:

```bash
# This will use what's in your configuration file
php artisan make:username
# personal-unrealistic-eland-30
```

You can pass in a number of options to change how the username is generated:

```bash
php artisan make:username --count 2 --digits 8 --casing studly
# OrdinaryHerring02683641
# WittyGoat89531555
```

```
Options:
  -c, --casing[=CASING]          The casing to use: "lower", "upper", "studly", "kebab", "camel", "snake", or "slug".
  -d, --digits[=DIGITS]          The number of digits to use for a prefix.
  -a, --adjectives[=ADJECTIVES]  The number of adjectives to use.
  -N, --nouns[=NOUNS]            The number of nouns to use.
  -C, --count[=COUNT]            The number of usernames to generate. [default: "1"]
```

## Testing

```bash
composer test
composer analyse
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Want to add a noun or adjective? Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
