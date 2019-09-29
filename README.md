# Country City API
[![Build Status](https://travis-ci.org/shivammathur/countrycity.svg?branch=master)](https://travis-ci.org/shivammathur/countrycity)
[![Code Climate](https://codeclimate.com/github/shivammathur/countrycity/badges/gpa.svg)](https://codeclimate.com/github/shivammathur/countrycity)
[![codecov](https://codecov.io/gh/shivammathur/countrycity/branch/master/graph/badge.svg)](https://codecov.io/gh/shivammathur/countrycity)
[![License](https://poser.pugx.org/shivammathur/countrycity/license)](license.md)
[![Support me on Patreon](https://shivammathur.com/badges/patreon.svg)](https://www.patreon.com/shivammathur)
[![Support me on Paypal](https://shivammathur.com/badges/paypal.svg)](https://www.paypal.me/shivammathur)
[![Get Help on codementor](https://cdn.codementor.io/badges/get_help_github.svg)](https://www.codementor.io/shivammathur?utm_source=github&utm_medium=button&utm_term=shivammathur&utm_campaign=github)

This is geodata API built to get the data with countries in the world and cities in a particular country. This API is a plugin for creating drop-downs in a form which populate via an AJAX request. You can find a [select2](https://select2.org/) implementation [here](https://shivammathur.github.io/countrycity/). Code for this implementation is in [`example`](example) directory.

<p align="center">
	<img src="https://shivammathur.com/countrycity/countrycity.gif">	
</p>

### :zap: Installing the CountryCity API

- Download this API using [composer](https://getcomposer.org/download/) using the command below.
```bash
$ composer global require shivammathur/countrycity "master-dev"
```
- Then install the API using by executing the command below.
```bash
$ composer create-project shivammathur/countrycity countrycity "master-dev" --prefer-dist
```
- You are all set, you can use this API.

### :hash: API Endpoints

All API responses are in `json` format.

- Get all countries
```bash
/countries

# Without URL Rewriting
/index.php/countries
```

- Get all cities in a country
```bash
/cities/{countryName}

# Without URL Rewriting
/index.php/cities/{countryName}
```

### :sparkles: Rest API Features
- Built using Slim micro framework.
- Caching enabled with following headers
  - ETag
  - Expires
  - Last-Modified
- Fast and lightweight API
- PSR 7 Complaint

### :cloud: Hosting configuration
Here are the [Configuration Instructions](http://www.slimframework.com/docs/v3/start/web-servers.html) if you want to host this on your server.	

### :wrench: Error Format

If there is an error in the API, you will get an error in `json` format as response
```json
{"error":"true", "message": "error message here"}
```                

### :rotating_light: Testing
```bash
$ vendor/bin/phpunit --configuration phpunit.xml.dist
```

## :scroll: License

The scripts and documentation in this project are released under the [MIT License](LICENSE). This project has multiple [dependencies](https://github.com/shivammathur/countrycity/network/dependencies) and their licenses can be found in their respective repositories.

## :+1: Contributions

Contributions are welcome! See [Contributor's Guide](.github/CONTRIBUTING.md).

## :sparkling_heart: Support this project

- Please star the project and share it among your developer friends.
- Consider supporting on <a href="https://www.patreon.com/shivammathur"><img alt="Support me on Patreon" src="https://shivammathur.com/badges/patreon.svg"></a> and <a href="https://www.paypal.me/shivammathur"><img alt="Support me on Paypal" src="https://shivammathur.com/badges/paypal.svg"></a>.