<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Domain details</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>
        <?php

require 'db_conn.php';
$sql1="SELECT * FROM registrar_info";
$sql2="SELECT * FROM registrar_info";
$res2=mysqli_query($conn,$sql1);
$sql3="SELECT * FROM users";
$res3=mysqli_query($conn,$sql3);
$res1=mysqli_query($conn,$sql3);
$sql4="SELECT * FROM users";
$res4=mysqli_query($conn,$sql4);

?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>domain add 
                            <a href="index3.php" class="btn btn-danger float-end">view data</a>
                            <a href="indexx.html" class="btn btn-danger float-end">BACK to menu</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code2.php" method="POST">
                        <div class="mb-3">
                                <label>username</label>
                                <select name="username" class="form-control">
                                  <?php while($rows2=mysqli_fetch_array($res1)){
                                    ?>
                                     <option> <?php echo $rows2['username'];  ?></option>
                                    <?php
                                    
                                  }
                                  ?>
                                </select>
                            <div class="mb-3">
                                <label>Domain Name</label>
                                <input type="text" required name="name" class="form-control">
                            </div>
                           
                            
                            <div class="mb-3">
                                <label>Registrar</label>
                                <select name="Registrar" class="form-control">
                                  <?php while($rows2=mysqli_fetch_array($res2)){
                                    ?>
                                     <option> <?php echo $rows2['Registrar'];  ?></option>
                                    <?php
                                    
                                  }
                                  ?>
                                </select>
                                
                                </div>
                              
                            <div class="mb-3">
                                <label>Purchase date</label>
                                <input type="date"  required name="purchase_date" class="form-control">
                            </div>
							<div class="mb-3">
                                <label>Expiry date</label>
                                <input type="date" required name="expiry_date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>IP Address</label>
                                <input type="text" required name="ip_address" class="form-control">
                            </div>
                            
                            <label>email</label>
                                <select name="email" class="form-control">
                                  <?php while($rows2=mysqli_fetch_array($res4)){
                                    ?>
                                     <option> <?php echo $rows2['email'];  ?></option>
                                    <?php
                                    
                                  }
                                  ?>
                                </select>
                                <div class="mb-3">
                                <label>days left</label>
                                <input type="number"  name="days_left" class="form-control">
                            </div>
							
                            <div class="mb-3">
                                <button type="submit" name="save_domain" class="btn btn-primary">Save domain</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>