<?php

$servername = "localhost";
$username = "admin";
$password = "admin123";
$dbname = "base_php";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>