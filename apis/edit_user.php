<?php
// Connect to the database 
  require "../db_connect.php";


// Get the data from the request
$id = $_GET['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$profile_picture = $_POST['profile_picture'];
$password = $_POST['password'];
$type = $_POST['type'];
$shop_name = null;
$shop_phone = null;
$shop_location = null;

if ($type == 'seller') {
  $shop_name = $_POST['shop_name'];
  $shop_phone = $_POST['shop_phone'];
  $shop_location = $_POST['shop_location'];
}

// Update the data in the database
$sql = "UPDATE users SET name='" . $name . "', email='" . $email . "', profile_picture='" . $profile_picture . "', password='" . $password . "', type='" . $type . "', shop_name='" . $shop_name . "', shop_phone='" . $shop_phone . "', shop_location='" . $shop_location . "' WHERE id=" . $id;

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
