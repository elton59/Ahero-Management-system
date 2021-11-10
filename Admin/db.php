<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Ahero";

// Create connection
$mysqli =new mysqli($servername, $username, $password,$db)or die(mysqli_error($mysqli));

// Check connection
if (!$mysqli) {
 die($mysqli->error);
}


?>
