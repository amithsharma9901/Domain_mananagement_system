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
                            <a href="user-query1.php" class="btn btn-primary float-end">ftp details</a>
                            <a href="days-left.php" class="btn btn-primary float-end">get Domain-expiring in 30 days</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>sr</th>
                                    <th>domain</th>
                                    <th>purchase_date</th>
                                    <th>expiry_date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 $username = $_SESSION['username'];
                                    $query = "SELECT * FROM domain_details where username='$username'";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['sr']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['purchase_date']; ?></td>
                                                <td><?= $row['expiry_date']; ?></td>
												
                                                <td>
                                                   
                                                    
                                                    <form action="codee1.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_domains" value="<?=$row['sr'];?>" class="btn btn-danger btn-sm">Delete</button>
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
                        <a href="home.html" class="btn btn-primary float-end">logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>