<?php
if(class_exists("MongoDB\Client")) {
	try{
		$m = new MongoDB\Client(); //creating a mongo client
		$dbName = "countrycity";
		$db = $m->$dbName;	//select countrycity database
	} catch ( MongoConnectionException $e ) {
		echo json_encode(array("error"=>"true", "message" => "Couldn't connect to MongoDB, is the 'mongo' process running?"));
		exit();
	}
} else {
	echo json_encode(array("error"=>"true", "message" => "MongoDB class not found. Make sure you have installed the MongoDB driver correctly"));
	exit();	
}
?>
