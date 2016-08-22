<?php

require __DIR__.'\db.php';

$geodata = $db->geo->findOne([], ["_id" => false, ucwords($data['countryName']) => true]);

if($geodata){
	$cities = array_values($geodata)[0];
	sort($cities);
	echo json_encode($cities, JSON_UNESCAPED_UNICODE);
} else {
	echo json_encode(array("error"=>"true", "message" => "There is no country named '".$data['countryName']."'"));
}
