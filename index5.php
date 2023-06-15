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

    <title>ftp details</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Domain FTP Details Details
                            <a href="ftp-create.php" class="btn btn-primary float-end">create Domain-ftp details</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>sr</th>
                                    <th>Domain name</th>
                                    <th>FTP Hostname</th>
                                    <th>Database host</th>
                                    <th>Database name</th>
                                    <th>FTP Username</th>
									<th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM ftp_information";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['sr']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['FTP_hostname']; ?></td>
                                                <td><?= $row['Database_host']; ?></td>
												<td><?= $row['database_name']; ?></td>
                                                <td><?= $row['username']; ?></td>
                                                <td>
                                                    <a href="ftp-view.php?id=<?= $row['sr']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="ftp-edit.php?id=<?= $row['sr']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code4.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_ftp" value="<?=$row['sr'];?>" class="btn btn-danger btn-sm">Delete</button>
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>