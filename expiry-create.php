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

    <title>Domain expiry details</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <?php

require 'db_conn.php';
$sql1="SELECT * FROM registrar_info";
$sql2="SELECT * FROM domain_details";
$sql3="SELECT * FROM domain_details";
$sql4="SELECT * FROM domain_details";
$res2=mysqli_query($conn,$sql1);
$res1=mysqli_query($conn,$sql2);
$res3=mysqli_query($conn,$sql3);
$res4=mysqli_query($conn,$sql4);
?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>domain expiry 
                            <a href="index4.php" class="btn btn-danger float-end">view data</a>
                            <a href="indexx.html" class="btn btn-danger float-end">BACK to menu</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code3.php" method="POST">

                        <div class="mb-3">
                                <label>Domain name</label>
                                <select name="name" class="form-control">
                                  <?php while($rows=mysqli_fetch_array($res1)){
                                    ?>
                                     <option><?php echo $rows['name'];  ?></option>
                                    <?php
                                    
                                  }
                                  ?>
                                </select>
                                
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
                                <select name="purchase_date" class="form-control">
                                  <?php while($rows=mysqli_fetch_array($res4)){
                                    ?>
                                     <option><?php echo $rows['purchase_date'];  ?></option>
                                    <?php
                                    
                                  }
                                  ?>
                                </select>
                                
                            </div>
							<div class="mb-3">
                                <label>expiry date</label>
                                <select name="expiry_date" class="form-control">
                                  <?php while($rows=mysqli_fetch_array($res3)){
                                    ?>
                                     <option><?php echo $rows['expiry_date'];  ?></option>
                                    <?php
                                    
                                  }
                                  ?>
                                </select>
                                
                            </div>
                            <div class="mb-3">
                                <label>total days</label>
                                <input type="integer"  name="days_left" class="form-control">
                            </div>
                           
							
                            <div class="mb-3">
                                <button type="submit" name="save_domain" class="btn btn-primary">Save domain Expiry</button>
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