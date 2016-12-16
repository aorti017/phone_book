<?php
	#Credentials used to connect to the DB
	$servername = "localhost";
	$dbname = "webApp";
	$username = "root";
	$password = "testpass11235";

	#Establish connection the the DB
	$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

	#Query all of the contacts
	$query = $pdo->prepare('SELECT * FROM addressBook;');
	$query->execute();

	#Get all of the query results
	$results = $query->fetchAll();

	#Init array to store the contacts
	$contacts = array();

	#Iterate over each query result and add them to the array
	foreach($results as $row){
		$contacts[$row["name"]] = $row["number"];
	}

	#Encode the array in json and return
	echo json_encode($contacts);

?>
