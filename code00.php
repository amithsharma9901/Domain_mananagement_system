<?php
session_start();
require 'db_conn.php';
if(isset($_POST['username']) || isset($_POST['name']) || isset($_POST['Registrar']) || isset($_POST['purchase_date']) || isset($_POST['expiry_date']) || isset($_POST['ip_address']) || isset($_POST['email']) ||isset($_POST['days_left']))
{    
    $username=$_POST['username'];
    $domain = $_POST['name'];
    
     $Registrar = $_POST['Registrar'];
   
	 
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

     $sql = "INSERT INTO `domain_details`(`username`, `name`, `Registrar`, `purchase_date`, `expiry_date`, `ip_address`, `email`,`days_left`) VALUES ('$username','$domain','$Registrar','$today_date','$date3','$ip_address','$email','$x')";
     if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "domain Created Successfully";
        header("Location: new.php");
        exit(0);
     } else {
        $_SESSION['message'] = "domain Not Created";
        header("Location: new.php");
        exit(0);
     }
     
   
}



?>
