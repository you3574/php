<?php

$conn = new mysqli("localhost", "etowner", "!dlxlelql", "etdatabase");
$what_conn="etconn";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>