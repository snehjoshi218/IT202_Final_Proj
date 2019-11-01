<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pull in config.php so we can access the variables from it
require('config.php');
echo "Loaded Host: " . $host;
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
		
	//TODO select query using bindable :username is where clause
	//select * from TestUsers where username =
	$select_query = "select * from `TestUsers` where username = :username";
	$stmt = $db->prepare($select_query);
	$r = $stmt->execute(array(":username"=> "Billy"));
	$results = $stmt->fetch(PDO::FETCH_ASSOC);
	//print_r($stmt->errorInfo());
	echo "<pre>" . var_export($results, true) . "</pre>"; 
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
