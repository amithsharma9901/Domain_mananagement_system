<?php
session_start();
require 'db_conn.php';

$records=mysqli_query($conn,"CALL date");
while($obj=mysqli_fetch_array($records)){
    echo $obj[0] ;
}
?>



