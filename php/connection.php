<?php
$dbhost = "localhost";
$dbuser = "root"; #change me 
$dbpass = "root"; #change me
$dbname = "forms";
try {
	$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

} catch (\Throwable $th) {
	echo "Error connecting to database, please contact server owner";
	exit();
}
?>
