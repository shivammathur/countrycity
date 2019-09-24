# Country City API
[![Build Status](https://travis-ci.org/shivammathur/countrycity.svg?branch=master)](https://travis-ci.org/shivammathur/countrycity)
[![Code Climate](https://codeclimate.com/github/shivammathur/countrycity/badges/gpa.svg)](https://codeclimate.com/github/shivammathur/countrycity)
[![codecov](https://codecov.io/gh/shivammathur/countrycity/branch/master/graph/badge.svg)](https://codecov.io/gh/shivammathur/countrycity)
[![License](https://poser.pugx.org/shivammathur/countrycity/license)](license.md)
[![Support me on Patreon](https://shivammathur.com/badges/patreon.svg)](https://www.patreon.com/shivammathur)
[![Support me on Paypal](https://shivammathur.com/badges/paypal.svg)](https://www.paypal.me/shivammathur)
[![Get Help on codementor](https://cdn.codementor.io/badges/get_help_github.svg)](https://www.codementor.io/shivammathur?utm_source=github&utm_medium=button&utm_term=shivammathur&utm_campaign=github)

Country City API is a REST API to get a list of all the countries in the world. It can also be used to get a list of all the cities in a country.

### :zap: Installing the API

- Download this API using [composer](https://getcomposer.org/download/) by executing the command below.
```bash
composer global require shivammathur/countrycity "master-dev"
```
- Then install the API using by executing the command below.
```bash
composer create-project shivammathur/countrycity countrycity "master-dev" --prefer-dist
```
- You are all set.

### :sparkles: Rest API Features
- Built using Slim micro framework.
- Caching enabled with following headers
  - ETag
  - Expires
  - Last-Modified
- Fast and lightweight API
- PSR 7 Complaint

### :hash: API Endpoints

All API responses are in `json` format.

- Get the list of all countries
```
/countries
```

- Get the list all cities in a country
```
/cities/{countryName}
```

### :wrench: Error Format

If there is an error in the API, you will get an error in `json` format as response
```json
{"error":"true", "message": "error message here"}
```                

### :rotating_light: Testing
```bash
vendor/bin/phpunit --configuration phpunit.xml.dist
```
