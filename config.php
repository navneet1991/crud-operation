<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";

$conn = mysqli_connect($servername, $username, $password, $db);

// Check The Connection
if (mysqli_connect_errno() ){
	echo "Database Connection Failed: " . mysqli_connect_error();
	die;
}

mysqli_set_charset($conn,"utf8");
?>