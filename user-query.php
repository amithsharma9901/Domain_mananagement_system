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

    <title>Domain Registrar details</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Domain Registrar Details
                        
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                <th>Domain</th>
                                    <th>username</th>
                                    <th>Registrar</th>
                                    
                                    
                                    <th>host</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $username = $_SESSION['username'];
                                    $query = "SELECT d.name,d.username,d.Registrar,h.host from domain_details d ,hosting h where h.username=d.username and d.username='$username'";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                            <td><?= $row['name']; ?></td>
                                                <td><?= $row['username']; ?></td>
                                                <td><?= $row['Registrar']; ?></td>
                                              
                                                
												<td><?= $row['host']; ?></td>
                                                
                                                
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
                        <a href="user-query1.php" class="btn btn-primary float-end">previous page </a>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>