<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_Registrar']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_Registrar']);

    $query = "DELETE FROM registrar_info WHERE sr='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Registrar Deleted Successfully";
        header("Location: index2.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Registrar Not Deleted";
        header("Location: index2.php");
        exit(0);
    }
}

if(isset($_POST['update_Registrar']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['sr']);

    $name = mysqli_real_escape_string($conn, $_POST['Registrar']);
  
    $phone = mysqli_real_escape_string($conn, $_POST['username']);
    $date = mysqli_real_escape_string($conn, $_POST['price']);

    $query = "UPDATE registrar_info SET `sr`='$student_id',`Registrar`='$name',`username`='$phone',`price`='$date' WHERE sr=$student_id";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Registrar details Updated Successfully";
        header("Location: index2.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Registrar details Not Updated";
        header("Location: index2.php");
        exit(0);
    }

}

if(isset($_POST['save_Registrar'])){

  
    $name = mysqli_real_escape_string($conn,$_POST['Registrar']);
    
    $rows = mysqli_real_escape_string($conn,$_POST['username']);
    $course = mysqli_real_escape_string($conn,$_POST['price']);
  

    $query = "INSERT INTO registrar_info (Registrar,username,price)
     VALUES ('$name','$rows','$course')"; 
    $query_run = mysqli_query($conn, $query);
   
    if($query_run)
    {
        $_SESSION['message'] = "Registrar Created Successfully";
        header("Location: registrar-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Registrar Not Created";
        header("Location: registrar-create.php");
        exit(0);
    }
}


?>





