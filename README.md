# Address

[![Packagist PHP support](https://img.shields.io/packagist/php-v/sfneal/address)](https://packagist.org/packages/sfneal/address)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/sfneal/address.svg?style=flat-square)](https://packagist.org/packages/sfneal/address)
[![Build Status](https://travis-ci.com/sfneal/address.svg?branch=master&style=flat-square)](https://travis-ci.com/sfneal/address)
[![StyleCI](https://github.styleci.io/repos/307752512/shield?branch=master)](https://github.styleci.io/repos/307752512?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sfneal/address/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sfneal/address/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/sfneal/address.svg?style=flat-square)](https://packagist.org/packages/sfneal/address)

Add polymorphic 'address' relationships to Eloquent Models in Laravel applications.

## Installation

You can install the package via composer:

```bash
composer require sfneal/address
```

To make use of database migration, publish the Service Provider.

``` php
php artisan vendor:publish --provider="Sfneal\Address\Providers\AddressServiceProvider"
```

## Usage

Add a 'address' relationship to an Eloquent Model.

``` php
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Sfneal\Address\Models\Address;


/**
 * Address relationship.
 *
 * @return MorphOne|Address
 */
public function address()
{
    return $this->morphOne(Address::class, 'addressable');
}
```

### Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email stephen.neal14@gmail.com instead of using the issue tracker.

## Credits

- [Stephen Neal](https://github.com/sfneal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).
