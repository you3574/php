<?php

$conn = new mysqli("localhost", "root", "!dlxlelql", "myhome");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>