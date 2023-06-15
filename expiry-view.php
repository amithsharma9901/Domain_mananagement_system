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

    <title>domain View</title>
</head>
<body>

    <div class="container mt-5">
<?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>domain expiry View Details 
                            <a href="index4.php" class="btn btn-danger float-end">BACK</a>        
                    </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM domain_expiry WHERE sr='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Domain Name </label>
                                        <p class="form-control">
                                            <?=$student['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Registrar</label>
                                        <p class="form-control">
                                            <?=$student['Registrar'];?>
                                        </p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Purchase date</label>
                                        <p class="form-control">
                                            <?=$student['purchase_date'];?>
                                        </p>
                                    </div>
									<div class="mb-3">
                                        <label>Expiry date</label>
                                        <p class="form-control">
                                            <?=$student['expiry_date'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>total days</label>
                                        <p class="form-control">
                                            <?=$student['days_left'];?>
                                        </p>
                                    </div>
                                    

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