<?php
if(class_exists("MongoClient")) {
	try{
		$m = new MongoClient(); //creating a mongo client
		$db = $m->selectDB("countrycity");	//select countrycity database
	} catch ( MongoConnectionException $e ) {
		echo json_encode(array("error"=>"true", "message" => "Couldn't connect to MongoDB, is the 'mongo' process running?"));
		exit();
	}
} else {
	echo json_encode(array("error"=>"true", "message" => "MongoDB class not found. Make sure you have installed the MongoDB driver correctly"));
	exit();	
}
?>
