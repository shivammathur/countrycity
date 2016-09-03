[![Build Status](https://travis-ci.org/shivammathur/countrycity.svg?branch=master)](https://travis-ci.org/shivammathur/countrycity)
[![Code Climate](https://codeclimate.com/github/shivammathur/countrycity/badges/gpa.svg)](https://codeclimate.com/github/shivammathur/countrycity)
[![Coverage Status](https://coveralls.io/repos/github/shivammathur/countrycity/badge.svg?branch=master)](https://coveralls.io/github/shivammathur/countrycity?branch=master)
[![codecov](https://codecov.io/gh/shivammathur/countrycity/branch/master/graph/badge.svg)](https://codecov.io/gh/shivammathur/countrycity)

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

- Restore the data into the MongoDB Database by using the below command in a new terminal.
```
mongorestore {countrycityapipath}/data/db/dump/countrycity/geo.bson
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
