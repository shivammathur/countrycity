<?php

namespace CountryCity\Templates;

use CountryCity\API\Location;

/** @var Location $Location */
$Location = new Location();

/** @var $data */
echo $Location->getCountries($data['search']);
