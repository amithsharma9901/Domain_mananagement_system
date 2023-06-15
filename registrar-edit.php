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

    <title>update Registrar details</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Registrar update
                           
                            <a href="index2.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['id']))
                        {
                            $sr_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM registrar_info WHERE sr='$sr_id' ";
                            
                            $query_run = mysqli_query($conn, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);
                               ?>
                              
                              <form action="code1.php" method="POST">
                                <input type="hidden" name="sr" value="<?= $row['sr']; ?>">

                                    <div class="mb-3">
                                        <label>Registrar Name</label>
                                        <input type="text" name="Registrar" value="<?=$row['Registrar'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>username</label>
                                        <input type="text" name="username" value="<?=$row['username'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>price</label>
                                        <input type="text" name="price" value="<?=$row['price'];?>" class="form-control">
                                    </div>
									
                                    <div class="mb-3">
                                        <button type="submit" name="update_Registrar" class="btn btn-primary">
                                            Update Registrar
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