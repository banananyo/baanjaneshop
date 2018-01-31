<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baanjane";

// $servername = "localhost";
// $username = "root";
// $password = "password";
// $dbname = "baanjane";

$mysqli = new mysqli($servername, $username, $password, $dbname);



      // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query("SET NAMES 'utf8'");
      // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>