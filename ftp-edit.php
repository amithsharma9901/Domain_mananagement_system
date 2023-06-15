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

    <title>update ftp details</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ftp update
                           
                            <a href="index5.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['id']))
                        {
                            $sr_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM ftp_information WHERE sr='$sr_id' ";
                            
                            $query_run = mysqli_query($conn, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);
                               ?>
                              
                              <form action="code4.php" method="POST">
                                <input type="hidden" name="sr" value="<?= $row['sr']; ?>">

                                    <div class="mb-3">
                                        <label>Domain</label>
                                        <input type="text" name="name" value="<?=$row['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>FTP_hostname</label>
                                        <input type="text" name="FTP_hostname" value="<?=$row['FTP_hostname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Database_host</label>
                                        <input type="text" name="Database_host" value="<?=$row['Database_host'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Database_name</label>
                                        <input type="text" name="database_name" value="<?=$row['database_name'];?>" class="form-control">
                                    </div>
									<div class="mb-3">
                                        <label>ftp_username</label>
                                        <input type="text" name="username" value="<?=$row['username'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_ftp" class="btn btn-primary">
                                            Update ftp details
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