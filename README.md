# Extra Artisan Commands

[![Latest Version on Packagist](https://img.shields.io/packagist/v/justinbyrne/extra-artisan-commands.svg?style=flat-square)](https://packagist.org/packages/justinbyrne/extra-artisan-commands)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/justinbyrne/extra-artisan-commands/run-tests?label=tests)](https://github.com/justinbyrne/extra-artisan-commands/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/justinbyrne/extra-artisan-commands/Check%20&%20fix%20styling?label=code%20style)](https://github.com/justinbyrne/extra-artisan-commands/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/justinbyrne/extra-artisan-commands.svg?style=flat-square)](https://packagist.org/packages/justinbyrne/extra-artisan-commands)

Useful artisan commands for Laravel to help perform regular tasks.

## Installation

You can install the package via composer:

```bash
composer require justinbyrne/extra-artisan-commands
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="extra-artisan-commands-config"
```

This is the contents of the published config file:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Create new user fields
    |--------------------------------------------------------------------------
    |
    | The fields that are needed to create a new user, add or remove as
    | required.
    |
    */
    "user_fields" => [
        "name" => "string",
        "email" => "email",
        "password" => "password",
    ],
];
```

## Usage

The package adds artisan commands all of which cab be ran with `php artisan` then any of the commands in the list below.

| Command               | Description                                     |
| --------------------- | ----------------------------------------------- |
| `create:user`         | Create new user using the options in the config |
| `make:service {name}` | Create new service class                        |
| `make:action {name}`  | Create new action class                         |
| `make:trait {name}`   | Create new trait                                |

<!-- ## Testing

```bash
composer test
``` -->

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

<!-- ## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details. -->

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Justin Byrne](https://github.com/JustinByrne)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
