<?php
session_start();
require 'db_conn.php';
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate the user's credentials against the database
  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    // User is valid, store their username in a session variable
    $_SESSION['username'] = $username;
    // Redirect to the page with the domain details table
    header("Location: fetchs.php");
    exit;
  } else {
    // Invalid username or password
    echo "Invalid username or password. Please try again.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  
  <title>Domain Management System - Register</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<form method="post">

  <label for="username">Username:</label>
  <input type="text" name="username" id="username" required>
  <label for="password">Password:</label>
  <input type="password" name="password" id="password" required>
  <input type="submit" value="Log In">
  <a href="registerrr.php" class="btn btn-danger float-end">Register</a>
</form>



</body>
</html>
