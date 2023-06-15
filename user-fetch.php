<table>
  <tr>
    <th>Domain Name</th>
    <th>Expiration Date</th>
  </tr>
  <?php
   session_start();
   require 'db_conn.php';
  $username = $_SESSION['username']; // assume the user is already logged in
  $query = "SELECT name, expiry_date FROM domain_details WHERE username = '$username'";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['expiry_date'] . "</td>";
    echo "</tr>";
  }
  ?>
</table>