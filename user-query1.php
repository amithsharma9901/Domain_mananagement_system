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
                    
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    
                                    <th>domain</th>
                                    <th>ftp hostname</th>
                                    <th>username</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $username = $_SESSION['username'];
                                
                                    $query = "SELECT f.name,f.FTP_hostname,f.username from ftp_information f where f.username='$username'";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                               
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['FTP_hostname']; ?></td>
                                              
                                                <td><?= $row['username']; ?></td>
												
                                                
                                                
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
                        <a href="user-query.php" class="btn btn-primary float-end">registrar details </a>
                        <a href="fetchs.php" class="btn btn-primary float-end">previous page </a>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>