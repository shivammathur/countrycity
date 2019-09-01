# Country City API
[![Build Status](https://travis-ci.org/shivammathur/countrycity.svg?branch=master)](https://travis-ci.org/shivammathur/countrycity)
[![Code Climate](https://codeclimate.com/github/shivammathur/countrycity/badges/gpa.svg)](https://codeclimate.com/github/shivammathur/countrycity)
[![Coverage Status](https://coveralls.io/repos/github/shivammathur/countrycity/badge.svg?branch=master)](https://coveralls.io/github/shivammathur/countrycity?branch=master)
[![codecov](https://codecov.io/gh/shivammathur/countrycity/branch/master/graph/badge.svg)](https://codecov.io/gh/shivammathur/countrycity)
[![License](https://poser.pugx.org/shivammathur/countrycity/license)](https://packagist.org/packages/shivammathur/countrycity)

Country City API is a REST API to get a list of all the countries in the world. It can also be used to get a list of all the cities in a country.

### Installing the API

- Download this API using [composer](https://getcomposer.org/download/) by executing the command below.
```bash
composer global require shivammathur/countrycity "master-dev"
```
- Then install the API using by executing the command below.
```bash
composer create-project shivammathur/countrycity countrycity "master-dev" --prefer-dist
```
- You are all set.

### Rest API Features
- Built using Slim micro framework.
- Caching enabled with following headers
  - ETag
  - Expires
  - Last-Modified
- Fast and lightweight API
- PSR 7 Complaint

### API Endpoints

- Get All Countries
```
/countries
```

- Get All Cities in a Country
```
/cities/{countryName}
```

### Error Format
```json
{"error":"true", "message": "error message here"}
```                

### Testing
```bash
vendor/bin/phpunit --configuration phpunit.xml.dist
```
