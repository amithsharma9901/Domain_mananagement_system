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

    <title>Domain details</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Domain Details
                            
                            
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>sr</th>
                                    <th>Domain_name</th>
                                    <th>username</th>
                                    <th>Registrar</th>
                                    
                                    
                                    <th>Purchase date</th>
                                    <th>Expiry date</th>
                                    <th>IP Address</th>
                                    <th>Email</th>
                                    <th>Days left</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM domain_details";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['sr']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['username']; ?></td>
                                                <td><?= $row['Registrar']; ?></td>
                                                
                                                
                                                <td><?= $row['purchase_date']; ?></td>
												<td><?= $row['expiry_date']; ?></td>
                                                <td><?= $row['ip_address']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['days_left']; ?></td>
                                                <td>
                                                    
                                                    
                                                    <form action="code00.php" method="POST" class="d-inline">
                                                        
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                            
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                        <a href="new.php" class="btn btn-primary float-end">Register new  Domain</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>