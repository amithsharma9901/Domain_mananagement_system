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

    <title>ftp details</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>
        <?php
        require 'db_conn.php';
$sql1="SELECT * FROM domain_details";
$sql2="SELECT * FROM users";
$res2=mysqli_query($conn,$sql1);
$res1=mysqli_query($conn,$sql2);
?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ftp add
                            <a href="index5.php" class="btn btn-danger float-end">view data</a>
                            <a href="indexx.html" class="btn btn-danger float-end">BACK to menu</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code4.php" method="POST">

                            <div class="mb-3">
                                
                                <label>Domain name</label>
                                <select name="name" class="form-control">
                                  <?php while($rows2=mysqli_fetch_array($res2)){
                                    ?>
                                     <option> <?php echo $rows2['name'];  ?></option>
                                    <?php
                                    
                                  }
                                  ?>
                                </select>
                                
                            </div>
                            <div class="mb-3">
                                <label>FTP_hostname</label>
                                <input type="text"  required name="FTP_hostname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>database_host</label>
                                <input type="text" required name="Database_host" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>database_name</label>
                                <input type="text" required name="database_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>FTP_username</label>
                                <select name="username" class="form-control">
                                  <?php while($rows=mysqli_fetch_array($res1)){
                                    ?>
                                     <option><?php echo $rows['username'];  ?></option>
                                    <?php
                                    
                                  }
                                  ?>
                                </select>
                                
                            </div>
							
                            <div class="mb-3">
                                <button type="submit" name="save_ftp" class="btn btn-primary">Save ftp</button>
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