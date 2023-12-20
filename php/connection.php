<?php
$dbhost = "localhost";
$dbuser = "roodt";
$dbpass = "root";
$dbname = "forms";
try {
	$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

} catch (\Throwable $th) {
	echo "Error connecting to database, please contact server owner";
	exit();
}
?>
