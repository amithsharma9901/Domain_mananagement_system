<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_expiry']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_expiry']);

    $query = "DELETE FROM domain_expiry WHERE sr='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "expiry Deleted Successfully";
        header("Location: index4.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Domain Not Deleted";
        header("Location: index4.php");
        exit(0);
    }
}







if(isset($_POST['name']) || isset($_POST['Registrar']) || isset($_POST['purchase_date']) || isset($_POST['expiry_date']) || isset($_POST['days_left'])  )
{    
    $domain = $_POST['name'];
     $Registrar = $_POST['Registrar'];
     
	 $date2 = $_POST['purchase_date'];
     $date3 = $_POST['expiry_date'];
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
     
     $sql = "INSERT INTO `domain_expiry`(`name`, `Registrar`, `purchase_date`, `expiry_date`, `days_left`) VALUES ('$domain','$Registrar','$date2','$date3','$x')";
     if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "domain expiry Created Successfully";
        header("Location: expiry-create.php");
        exit(0);
     } else {
        $_SESSION['message'] = "domain Not Created";
        header("Location: expiry-create.php");
        exit(0);
     }
     
   
}



?>

