<?php

// Get Database Connection ($db)
require __DIR__.'\db.php';

// Query for city and country data
$geodata = $db->geo->findOne([], ["_id" => false]);
// $geodata   = ['country1'] => ['cityA', 'cityB', 'cityC', ...],
//              ['country2'] => ['cityX', 'cityY', 'cityZ', ...],
//              ...
//              ...
//              ...

if ($geodata) {
	$countries = array_keys($geodata);
	sort($countries);
	echo json_encode($countries, JSON_UNESCAPED_UNICODE);
} else {
	echo json_encode(array("error"=>"true", "message" => "No data is present in the database."));
}