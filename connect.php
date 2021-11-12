<?php 

$host = "localhost";
$username = "root";
$password = "";
$dbname = "test2";

$conn = mysqli_connect($host, $username, $password, $dbname);

if( $conn == true) {
	// echo "successful";
}else{
	echo mysqli_error($conn);
}



 ?>