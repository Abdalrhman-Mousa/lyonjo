<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lyonjo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>