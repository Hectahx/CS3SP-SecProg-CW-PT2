<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "forms";
try {
	$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

} catch (\Throwable $th) {
	echo "Error connecting to database, please contact server owner";
	exit();
}
?>
