<?php

require "db_connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>

<div class="container mt-5">
  <h1>Users</h1>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="users-table">


    </tbody>
  </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Make an ajax call to the API endpoint to get all users
  $.ajax({
    url: 'http://localhost/lyonjo/apis/get_all_users.php',
    type: 'GET',
    success: function(data) {
      // Parse the returned JSON data
      var users = JSON.parse(data);
      console.log(users);

      // Loop through the users array and add a row for each user
      for (var i = 0; i < users.length; i++) {
        var user = users[i];
        var row = '<tr id="user-' + user.id + '"><td>' + user.id + '</td><td>' + user.name + '</td><td>' + user.email + '</td><td>' + user.type + '</td><td>';

        // Add a view button
        row += '<button class="btn btn-secondary mr-2" onclick="viewUser(' + user.id + ')">View</button>';

        // Add an edit button
        row += '<button class="btn btn-primary mr-2" onclick="editUser(' + user.id + ')">Edit</button>';

        // Add a delete button
        row += '<button class="btn btn-danger" onclick="deleteUser(' + user.id + ')">Delete</button>';

        // Close the row
        row += '</td></tr>';

        // Add the row to the table
        $('#users-table').append(row);
      }
    }
  });

// delete the user

function deleteUser(id) {
    $.ajax({
      url: 'http://localhost/lyonjo/apis/delete_user.php',
      type: 'GET',
      data: {
        id: id
      },
      success: function(data) {
        // Remove the user row from the table
        $('#user-' + id).remove();
      }
    });
  }


  function viewUser(id) {
    $.ajax({
      url: 'http://localhost/lyonjo/apis/get_user.php',
      type: 'GET',
      data: {
        id: id
      },
      success: function(data) {
        // Parse the returned JSON data
        var user = JSON.parse(data);
        console.log(user);

        // Open the user data in a new window as a PDF
        window.open('http://localhost/lyonjo/apis/generate_pdf.php?id=' + id, '_blank');
      }
    });
  }


</script>


</body>
</html>

