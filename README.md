
[![Latest Version on Packagist](https://img.shields.io/packagist/v/epmnzava/income-expense.svg?style=flat-square)](https://packagist.org/packages/epmnzava/income-expense)
[![Build Status](https://img.shields.io/travis/epmnzava/income-expense/master.svg?style=flat-square)](https://travis-ci.org/epmnzava/income-expense)
[![Quality Score](https://img.shields.io/scrutinizer/g/dbrax/income-expense.svg?style=flat-square)](https://scrutinizer-ci.com/g/dbrax/income-expense)
[![Total Downloads](https://img.shields.io/packagist/dt/epmnzava/income-expense.svg?style=flat-square)](https://packagist.org/packages/epmnzava/income-expense)

This package is basically a component or a module to give you an overall skeleton so as you can build your next accounting software.It draws all necessary tables , relationship and queiries to get you easily started with an accounting basics it also helps you  add accouting functionalities to your currenct laravel software.
## Installation

- Laravel Version: ˆ7.2 ==> ^8.0
- PHP Version: ^7.1|^7.2|^7.3|^7.4|^8.0

You can install the package via composer:

```bash
composer require epmnzava/income-expense
```

# Update your config (for Laravel 5.4 and below)
Add the service provider to the providers array in config/app.php:
```
Epmnzava\IncomeExpense\IncomeExpenseServiceProvider::class,
```
Add the facade to the aliases array in config/app.php:
```
'IncomeExpense'=>Epmnzava\IncomeExpense\IncomeExpenseFacade::class,
```

# Publish the package configuration (for Laravel 5.4 and below)
Publish the configuration file and migrations by running the provided console command:
```
php artisan vendor:publish --provider="Epmnzava\IncomeExpense\IncomeExpenseServiceProvider"
```
### Environmental Variables

INCOME_CURRENCY `Provide your desired currency `
INCOME_SEND_MAIL `Provice 1 if you want to be sending email notifications and 0 if you dont`


## Usage

``` php
// coming soon

```

### Testing

``` bash
composer test
```

### USED IN

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email epmnzava@gmail.com instead of using the issue tracker.

## Credits

- [Emmanuel Mnzava](https://github.com/dbrax)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
