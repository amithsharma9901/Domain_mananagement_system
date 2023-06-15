<form action="fetch.php" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username">
  <br>
  <input type="submit" value="Get Domain Details">
</form>
<?php
 session_start();
 require 'db_conn.php';
if (isset($_POST['username'])) {
  $username = $_POST['username'];
  
  // validate and sanitize the username
 
  
  // query the database to retrieve the user's ID
  $query = "SELECT id FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($result);
  $user_id = $user['id'];
  
  // query the database to retrieve the domain details
  $query = "SELECT * FROM domain_details WHERE user_id = '$user_id'";
  $result = mysqli_query($conn, $query);
  $domain = mysqli_fetch_assoc($result);
  
  // display the domain details
  echo "Domain Name: " . $domain['name'] . "<br>";
  echo "Registration Date: " . $domain['purchase_date'] . "<br>";
  echo "Expiration Date: " . $domain['expiry_date'] . "<br>";
  
}
?>