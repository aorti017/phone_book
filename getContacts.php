<?php
	#Credentials used to connect to the DB
	$servername = "localhost";
	$dbname = "webApp";
	$username = "root";
	$password = "testpass11235";

	#Establish connection the the DB
	$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

	#Query all of the contacts
	$query = $pdo->prepare('SELECT * FROM phoneBook;');
	$query->execute();

	#Get all of the query results
	$results = $query->fetchAll();

	#Init array to store the contacts
	$contacts_name = array();
	$contacts_number = array();

	#Iterate over each query result and add them to the array
	foreach($results as $row){
		array_push($contacts_name, $row["name"]);
		array_push($contacts_number, $row["number"]);
	}

	#Combine the two arrays into one
	#This is done to handle the case where two contacts have the same
	#name and an assoc array cannot be used
	$return_arr = array(
				"names" => $contacts_name,
				"numbers" => $contacts_number
			);

	#Encode the array in json and return
	echo json_encode($return_arr);

?>
