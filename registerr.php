<?php     
session_start();
require 'db_conn.php';
//if submit is not blanked i.e. it is clicked.
if(isset($_POST['username']) || isset($_POST['password']) || isset($_POST['email']) )
{    
    $username=$_POST['username'];
    $domain = $_POST['password'];
  
     $email = $_POST['email'];
     $sql = "INSERT INTO `users`(`username`, `password`, `email`) VALUES ('$username','$domain','$email')";
     if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "registred Successfully";
        header("Location: registerr.php");
        exit(0);
     } else {
        $_SESSION['message'] = "not registred";
        header("Location: loginuser.php");
        exit(0);
     }
     
   
}


?>