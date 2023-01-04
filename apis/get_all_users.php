<?php

// Connect to the database 

  require "../db_connect.php";

  // Retrieve all users from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);