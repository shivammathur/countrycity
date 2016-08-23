<?php

// Get Database Connection ($db)
require __DIR__.'\db.php';

// Query for city and country data
// $geodata = ['country1'] => ['cityA', 'cityB', 'cityC', ...],
//            ['country2'] => ['cityX', 'cityY', 'cityZ', ...],
//            ...
//            ...
//            ...
$geodata = $db->geo->findOne(
	[],
	[
		'projection' => [
			'_id' => false
		],

		'typeMap' => [
			'root'     => 'array',
			'document' => 'array'
		]
	]
);

if ($geodata) {

	// Getting the names of countries from $geodata
	$countries = array_keys($geodata);

	sort($countries);
	echo json_encode($countries, JSON_UNESCAPED_UNICODE);
} else {
	echo json_encode(["error"=>"true", "message" => "No data is present in the database."]);
}