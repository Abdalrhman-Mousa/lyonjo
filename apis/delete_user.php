<?php

// Connect to the database 

  require "../db_connect.php";


// Get the id
$id = $_GET['id'];

// Delete the data from the database
$sql = "DELETE FROM users WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
