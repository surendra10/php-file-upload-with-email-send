<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "fileupload";

$conn       = mysqli_connect($servername, $username, $password, $dbname);
if($conn){
	//echo "successfull";
} else{
	echo 'No!...';
}


?>