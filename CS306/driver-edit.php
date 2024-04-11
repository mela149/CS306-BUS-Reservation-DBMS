<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Driver Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Driver Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $driver_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM drivers WHERE id='$driver_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $driver = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="driver_id" value="<?= $driver['ID']; ?>">

                                    <div class="mb-3">
                                        <label>Driver Name</label>
                                        <input type="text" name="name" value="<?=$driver['Name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Driver Age</label>
                                        <input type="text" name="age" value="<?=$driver['Age'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Driver address</label>
                                        <input type="text" name="address" value="<?=$driver['Address'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_driver" class="btn btn-primary">
                                            Update Driver
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