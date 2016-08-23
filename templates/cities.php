<?php

// Get Database Connection ($db)
require __DIR__.'\db.php';

$countryName = ucwords($data['countryName']);

// Query for cities in a country
// $geodata = ['countryName'] => ['cityA', 'cityB', 'cityC', ...];
$geodata = $db->geo->findOne(
	[],
	[
		'projection' => [
			'_id' => false,
			$countryName => true
		],

		'typeMap' => [
			'root'     => 'array',
			'document' => 'array'
		]
	]
);                

if ($geodata) {

	// Getting names of cities from $geodata
	$cities = $geodata[$countryName];

	sort($cities);
	echo json_encode($cities, JSON_UNESCAPED_UNICODE);
} else {
	echo json_encode(array("error"=>"true", "message" => "There is no country named '" . $data['countryName'] . "'"));
}
