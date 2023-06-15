<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_domain']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_domain']);

    $query = "DELETE FROM domain_details WHERE sr='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Domain Deleted Successfully";
        header("Location: index3.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Domain Not Deleted";
        header("Location: index3.php");
        exit(0);
    }
}

if(isset($_POST['update_domain']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['sr']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $id = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['Registrar']);
    
    $date = mysqli_real_escape_string($conn, $_POST['purchase_date']);
$bill = mysqli_real_escape_string($conn, $_POST['expiry_date']);
$aman = mysqli_real_escape_string($conn, $_POST['ip_address']);
$boman = mysqli_real_escape_string($conn, $_POST['email']);
$x=mysqli_real_escape_string($conn, $_POST['days_left']);


    $query = "UPDATE domain_details SET `sr`='$student_id',`name`='$name',`username`='$id',`Registrar`='$email',`purchase_date`='$date',`expiry_date`='$bill',`ip_address`='$aman',`email`='$boman',`days_left`='$x' WHERE sr=$student_id";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "domain details Updated Successfully";
        header("Location: index3.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "domain details Not Updated";
        header("Location: index3.php");
        exit(0);
    }

}






if(isset($_POST['username']) || isset($_POST['name']) || isset($_POST['Registrar']) || isset($_POST['purchase_date']) || isset($_POST['expiry_date']) || isset($_POST['ip_address']) || isset($_POST['email']) ||isset($_POST['days_left']))
{    
    $username=$_POST['username'];
    $domain = $_POST['name'];
    
     $Registrar = $_POST['Registrar'];
   
	 $date2 = $_POST['purchase_date'];
     $date3 = $_POST['expiry_date'];
     $ip_address = $_POST['ip_address'];
     $email = $_POST['email'];
    
     $today_date=date('y-m-d');
     $exp=strtotime($date3);
     $td=strtotime($today_date);
     if($td>$exp){
        $datediff=$td-$exp;
        echo "domain expired";
        
     }
     else{
        $datediff=$td-$exp;
        echo "domain not expired";
        $x=abs(floor($datediff / (60 * 60 * 24)));
     }

     $sql = "INSERT INTO `domain_details`(`username`, `name`, `Registrar`, `purchase_date`, `expiry_date`, `ip_address`, `email`,`days_left`) VALUES ('$username','$domain','$Registrar','$date2','$date3','$ip_address','$email','$x')";
     if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "domain Created Successfully";
        header("Location: domain-create.php");
        exit(0);
     } else {
        $_SESSION['message'] = "domain Not Created";
        header("Location: domain-create.php");
        exit(0);
     }
     
   
}



?>

