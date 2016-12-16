<?php
	#Get the name and phone number of the contact to be removed
	$name = $_POST['name'];
	$num = $_POST['num'];

	#Credentials used to establish DB connection
	$servername = "localhost";
	$dbname = "webApp";
	$username = "root";
	$password = "testpass11235";

	#Establish DB connection
	$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

	#Remove the specified contact
	$query = $pdo->prepare("DELETE FROM phoneBook WHERE name='".$name."' and number=".$num.";");
	$query->execute();
?>
