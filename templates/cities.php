<?php

// Get Database Connection ($db)
require __DIR__.'\db.php';

// Query for cities in a country
$geodata = $db->geo->findOne([], ["_id" => false, ucwords($data['countryName']) => true]);
// $geodata = ['countryName'] => ['cityA', 'cityB', 'cityC', ...];                

if ($geodata) {
	$cities = $geodata[ucwords($data['countryName'])];
	sort($cities);
	echo json_encode($cities, JSON_UNESCAPED_UNICODE);
} else {
	echo json_encode(array("error"=>"true", "message" => "There is no country named '".$data['countryName']."'"));
}
