<?php
require "../db_connect.php";


$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Return the user data as JSON
echo json_encode($user);
