<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "angular_crud";

// konekcija sa bazom
$conn = new mysqli($servername, $username, $password, $dbname);

// proveravam konekciju
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 