<?php

namespace CountryCity\Templates;

use CountryCity\API\Location;

/** @var Location $Location */
$Location = new Location('data/geo.json');

/** @var $data */
echo $Location->getAllCities($data['countryName']);
