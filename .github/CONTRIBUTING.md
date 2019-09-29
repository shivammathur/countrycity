# Contributing to countrycity

## Contributor Code of Conduct

Please note that this project is released with a [Contributor Code of Conduct](CODE_OF_CONDUCT.md). By participating in this project you agree to abide by its terms.

## Workflow

* Fork the project.
* Make your bug fix or feature addition.
* Add tests for it. This is important so we don't break it in a future version unintentionally.
* Send a pull request to the develop branch.

Please make sure that you have [set up your user name and email address](https://git-scm.com/book/en/v2/Getting-Started-First-Time-Git-Setup) for use with Git. Strings such as `silly nick name <root@localhost>` look really stupid in the commit history of a project.

Due to time constraints, you may not always get a quick responce. Please do not take delays personal and feel free to remind me.

## Using countrycity from a Git checkout

The following commands can be used to perform the initial checkout of countrycity:

```bash
$ git clone https://github.com/shivammathur/countrycity.git

$ cd countrycity
```

Install countrycity dependencies using [composer](https://getcomposer.org/download/)

```bash
$ composer install
```

## Using countrycity using packagist

- Download this API using [composer](https://getcomposer.org/download/) by executing the command below.
```bash
composer global require shivammathur/countrycity "master-dev"
```
- Then install the API using by executing the command below.
```bash
composer create-project shivammathur/countrycity countrycity "master-dev" --prefer-dist
```

## Running the test suite

After following the steps shown above, The `countrycity` tests in the `tests` directory can be run using this command:

```bash
$ vendor/bin/phpunit --configuration phpunit.xml.dist
```

## Reporting issues

Please submit the issue using the appropiate template provided for a bug report or a feature request:

* [Issues](https://github.com/shivammathur/countrycity/issues)