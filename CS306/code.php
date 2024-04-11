<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_driver']))
{
    $driver_id = mysqli_real_escape_string($con, $_POST['delete_driver']);

    $query = "DELETE FROM drivers WHERE id='$driver_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Driver Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Driver Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_driver']))
{
    $driver_id = mysqli_real_escape_string($con, $_POST['driver_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "UPDATE drivers SET name='$name', age='$age', Address ='$address' WHERE ID='$driver_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Driver Updated Successfully $query";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Driver Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_driver']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "INSERT INTO drivers (name,age,address) VALUES ('$name','$age','$address')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Driver Created Successfully";
        header("Location: driver-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Driver Not Created";
        header("Location: driver-create.php");
        exit(0);
    }
}

?>