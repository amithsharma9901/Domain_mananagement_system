<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "domain");

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the form data
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $email = $_POST['email'];
  $first_name = $_POST['first-name'];
  $last_name = $_POST['last-name'];

  // Insert the new user into the database
  $query = "INSERT INTO users (username, password, email, first-name, last-name) VALUES ($username,$password,$email,$first_name,$last_name)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("sssss", $username, $password, $email, $first_name, $last_name);
  $stmt->execute();

  // Redirect to the login page
  header("Location: login.html");
  exit();
}
?>