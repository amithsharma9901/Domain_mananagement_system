<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_ftp']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_ftp']);

    $query = "DELETE FROM ftp_information WHERE sr='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "ftp Deleted Successfully";
        header("Location: index5.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "ftp Not Deleted";
        header("Location: index5.php");
        exit(0);
    }
}

if(isset($_POST['update_ftp']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['sr']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['FTP_hostname']);
    $phone = mysqli_real_escape_string($conn, $_POST['Database_host']);
    $date = mysqli_real_escape_string($conn, $_POST['database_name']);
$bill = mysqli_real_escape_string($conn, $_POST['username']);
    $query = "UPDATE ftp_information SET `sr`='$student_id',`name`='$name',`FTP_hostname`='$email',`Database_host`='$phone',`database_name`='$date',`username`='$bill' WHERE sr=$student_id";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "ftp details Updated Successfully";
        header("Location: index5.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "host details Not Updated";
        header("Location: index5.php");
        exit(0);
    }

}


if(isset($_POST['save_ftp']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['FTP_hostname']);
    $phone = mysqli_real_escape_string($conn, $_POST['Database_host']);
    $course = mysqli_real_escape_string($conn, $_POST['database_name']);
$bill = mysqli_real_escape_string($conn, $_POST['username']);

    $query = "INSERT INTO ftp_information(name,FTP_hostname,Database_host,database_name,username)
     VALUES ('$name','$email','$phone','$course','$bill')"; 
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "ftp Created Successfully";
        header("Location: ftp-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "ftp Not Created";
        header("Location: ftp-create.php");
        exit(0);
    }
}

?>