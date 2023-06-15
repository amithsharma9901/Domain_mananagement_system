<?php
session_start();
require 'db_conn.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>update Domain details</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>domain update
                           
                            <a href="index3.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['id']))
                        {
                            $sr_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM domain_details WHERE sr='$sr_id' ";
                            
                            $query_run = mysqli_query($conn, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);
                               ?>
                              
                              <form action="code2.php" method="POST">
                                <input type="hidden" name="sr" value="<?= $row['sr']; ?>">
                                <div class="mb-3">
                                        <label>username</label>
                                        <input type="text" name="username" value="<?=$row['username'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Domain Name</label>
                                        <input type="text" name="name" value="<?=$row['name'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Registrar</label>
                                        <input type="text" name="Registrar" value="<?=$row['Registrar'];?>" class="form-control">
                                    </div>
                                  
                                    
                                    
                                    <div class="mb-3">
                                        <label>Purchase date</label>
                                        <input type="date" name="purchase_date" value="<?=$row['purchase_date'];?>" class="form-control">
                                    </div>
									<div class="mb-3">
                                        <label>Expiry date</label>
                                        <input type="date" name="expiry_date" value="<?=$row['expiry_date'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>IP Address</label>
                                        <input type="text" name="ip_address" value="<?=$row['ip_address'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?=$row['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>days_left</label>
                                        <input type="number" name="days_left" value="<?=$row['days_left'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_domain" class="btn btn-primary">
                                            Update domain
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>