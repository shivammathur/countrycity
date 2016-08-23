[![Build Status](https://travis-ci.org/shivammathur/countrycity.svg?branch=master)](https://travis-ci.org/shivammathur/countrycity)

# Country City API
Country City API is a REST API to get a list of all the countries in the world. It can also be used to get a list of all the cities in a country.

### Installing the API

- Before installing this API you need to install MongoDB pecl extension by following installation instructions from [here](http://php.net/manual/en/mongodb.installation.php)

- Download this API using [composer](https://getcomposer.org/download/) by executing the command below.
```
composer global require shivammathur/countrycity "master-dev"
```
- Then install the API using by executing the command below.
```
composer create-project shivammathur/countrycity countrycity "master-dev" --prefer-dist
```
- Download and install MongoDB from [here](https://www.mongodb.org/downloads#production)
- Start MongoDB server by executing the below command.
```
mongod --dbpath {countrycityapipath}/data/db
```
- You are all set.

### API Endpoints

#### Get All Countries
```
/get/countries/
```

#### Get All Cities in a Country
```
/get/cities/{countryName}
```

### Error Format
```json
{"error":"true", "message": "error message here"}
```                
