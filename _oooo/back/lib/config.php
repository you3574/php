<?php

$servername = "localhost";
$username = "etowner";
$password = "!dlxlelql";
$dbname = "etdatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>

