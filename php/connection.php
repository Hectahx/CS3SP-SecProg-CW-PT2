<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "forms";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	echo "failed to connect to MySQL: ". mysqli_connect_error();
}
?>
