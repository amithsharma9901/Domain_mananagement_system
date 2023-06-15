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

    <title>Registrar details</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>
        <?php

require 'db_conn.php';
$sql="SELECT * FROM users";
$res=mysqli_query($conn,$sql)
?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Registrar Add 
                            <a href="index2.php" class="btn btn-danger float-end">view data</a>
                            <a href="indexx.html" class="btn btn-danger float-end">BACK to menu</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code1.php" method="POST">

                            <div class="mb-3">
                                <label>Registrar Name</label>
                                <input type="text" required name="Registrar" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <label>username</label>
                                <select name="username" class="form-control">
                                  <?php while($rows=mysqli_fetch_array($res)){
                                    ?>
                                     <option><?php echo $rows['username'];  ?></option>
                                    <?php
                                    
                                  }
                                  ?>
                                </select>
                                
                            </div>
                            <div class="mb-3">
                                <label>price</label>
                                <input type="integer" required name="price" class="form-control">
                            </div>
							
							
                            <div class="mb-3">
                                <button type="submit" name="save_Registrar" class="btn btn-primary">Save </button>
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