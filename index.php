<?php

require "db_connect.php";

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
// Form for add user
<form id="add-user-form">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="profile_picture">Profile Picture:</label>
    <input type="text" class="form-control" id="profile_picture" name="profile_picture">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="type">Type:</label>
    <select class="form-control" id="type" name="type">
      <option value="user">User</option>
      <option value="seller">Seller</option>
    </select>
  </div>
  <div class="form-group">
    <label for="shop_name">Shop Name:</label>
    <input type="text" class="form-control" id="shop_name" name="shop_name">
  </div>
  <div class="form-group">
    <label for="shop_phone">Shop Phone:</label>
    <input type="text" class="form-control" id="shop_phone" name="shop_phone">
  </div>
  <div class="form-group">
    <label for="shop_location">Shop Location:</label>
    <input type="text" class="form-control" id="shop_location" name="shop_location">
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>

//Js&Jquery files 

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $("#add-user-form").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      url: "http://localhost/lyonjo/apis/add_user.php",
      type: "POST",
      data: formData,
      success: function(data) {
        console.log("User added successfully");
      },
      error: function(error) {
        console.log(error);
      }
    });
  });
</script>
  </body>
</html>




