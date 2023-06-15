<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_domains']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_domains']);

    $query = "DELETE FROM domain_details WHERE sr='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Domain Deleted Successfully";
        header("Location: fetchs.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Domain Not Deleted";
        header("Location: fetchs.php");
        exit(0);
    }
}






if(isset($_POST['username']) || isset($_POST['name']) || isset($_POST['Registrar']) || isset($_POST['user_id'])|| isset($_POST['purchase_date']) || isset($_POST['expiry_date']) || isset($_POST['ip_address']) || isset($_POST['email']) )
{    
    $user=$_SESSION['username'];
    $domain = $_POST['name'];
     $Registrar = $_POST['Registrar'];
     $userid=$_POST['user_id'];
	 $date2 = $_POST['purchase_date'];
     $date3 = $_POST['expiry_date'];
     $ip_address = $_POST['ip_address'];
     $email = $_POST['email'];
     $sql = "INSERT INTO `domain_details`(`$_SESSION[username]`,`name`, `Registrar`, `user_id`, `purchase_date`, `expiry_date`, `ip_address`, `email`) VALUES ('$user',$domain','$Registrar','$userid','$date2','$date3','$ip_address','$email')";
     if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "domain Created Successfully";
        header("Location: domai-create.php");
        exit(0);
     } else {
        $_SESSION['message'] = "domain Not Created";
        header("Location: domai-create.php");
        exit(0);
     }
     
   
}



?>

