<?php

// MySQL connectivity
$connection = mysqli_connect("localhost", "root", "", "auction");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auction";

// Opening a connection to mySQL
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>