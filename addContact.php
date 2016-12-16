<?php
	#Get the name and phone number of the contact to be added
	$name = $_POST['name'];
	$num = $_POST['num'];

	#Credentials used to establish the DB connection
	$servername = "localhost";
	$dbname = "webApp";
	$username = "root";
	$password = "testpass11235";

	#Establish the DB connection
	$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

	#Add the specified contact
	#If contact already exists return error
	$query = $pdo->prepare("INSERT INTO addressBook VALUES ('".$name."', ".$num.");");
	if($query->execute()){
		echo "";
	}
	else{
		echo "fail";
	}
?>
