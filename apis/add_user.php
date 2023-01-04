<?php

require "../db_connect.php";

//Get data
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
  
  // Insert the data into the database
  $sql = "INSERT INTO users (name, email, profile_picture, password, type, shop_name, shop_phone, shop_location)
  VALUES ('$name', '$email', '$profile_picture', '$password', '$type', '$shop_name', '$shop_phone', '$shop_location')";
  
  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

  ?>
  

