<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baanjane";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";
// Change character set to utf8
mysqli_set_charset($conn,"utf8");

// $sql = file_get_contents('init.sql');
// if($sql != null && count($sql) > 0)
// $conn->query($sql);
?>