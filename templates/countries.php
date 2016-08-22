<?php
require __DIR__.'\db.php';

$geodata = $db->geo->findOne([], ["_id" => false]);
if($geodata){
	$countries = array_keys($geodata);
	sort($countries);
	echo json_encode($countries, JSON_UNESCAPED_UNICODE);
} else{
	echo json_encode(array("error"=>"true", "message" => "No data is present in the database."));
}