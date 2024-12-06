# Zypta

[![Dependabot Updates](https://github.com/zypta/zypta/actions/workflows/dependabot/dependabot-updates/badge.svg)](https://github.com/zypta/zypta/actions/workflows/dependabot/dependabot-updates)
[![PHP Code Styling](https://github.com/zypta/zypta/actions/workflows/fix-php-code-styling.yml/badge.svg)](https://github.com/zypta/zypta/actions/workflows/fix-php-code-styling.yml)
[![Tests](https://github.com/zypta/zypta/actions/workflows/tests.yml/badge.svg)](https://github.com/zypta/zypta/actions/workflows/tests.yml)

Open Source ERP system build for enterprise over Laravel & FilamentPHP.

## Installation

```bash
composer create-project zypta/zypta
```

## Developer Install

```bash
git@github.com:zypta/zypta.git
cd zypta
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan optimize
```
now you can run server

```bash
php artisan serve
```

or you can use docker

```bash
/vender/bin/sail up
```

## Testing

```bash
composer test
```

## Code Format

```bash
composer format
```

## Code Standers

```bash
composer analyse
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The Zypta is open-sourced software licensed under the [MIT license](LICENSE.md).

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.
