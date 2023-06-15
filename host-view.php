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

    <title>host View</title>
</head>
<body>

    <div class="container mt-5">
<?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>host View Details 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>        
                    </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM hosting WHERE sr='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>host </label>
                                        <p class="form-control">
                                            <?=$student['host'];?>
                                        </p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>username</label>
                                        <p class="form-control">
                                            <?=$student['username'];?>
                                        </p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Hosting type</label>
                                        <p class="form-control">
                                            <?=$student['type'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>amount</label>
                                        <p class="form-control">
                                            <?=$student['amount'];?>
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