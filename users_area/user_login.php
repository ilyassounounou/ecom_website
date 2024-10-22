<?php
include('../includes/connect.php'); 
include('../functions/common_function.php');
@session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
        body{
            overflow-x: hidden;
        }
    </style>

</head>
<body>
    

<div class="container-fluid my-3">
<h2 class="text-center">Login</h2>
<div class="row d-flex align-items-center justify-content-center mt-5">
    <div class="col-lg-12 col-xl-6">
       
        <form action="" method="post" enctype="multipart/form-data">
             <!-- usename -->
            <div class="form-outline mb-4">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" id="user_username" class="form-control" placeholder="entrer votre nom" autocomplete="off" require="require" name="user_username">
            </div>
     

                  <!-- password -->
                  <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" id="user_password" class="form-control" placeholder="entrer votre password" autocomplete="off" require="require" name="user_password">
            </div>

   


            <div class="mt-4 pt-2">
            <input type="submit" value="Login" class="bg-dark py-2 px-3 text-light border-0" name="user_login">
            <p class="small fw-bold d-flex justify-content-center align-items-center">Don't have an account? <a  href="user_registration.php" class="text-danger text-decoration-none">Register</a></p>
            </div>
           
        </form>
    </div>
</div>
</div>







<script src="js/popper.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];


    $select_query="Select * from `user_table` where username='$user_username'";
    $result=mysqli_query($connection,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
 
    //cart item
    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($connection,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            // echo "<script>alert('Login succesfully')</script>";
            if($row_count == 1 and $row_count_cart == 0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login succesfully')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login succesfully')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid credential')</script>"; 
        }
    }else{
        echo "<script>alert('Invalid credential')</script>";
    }
}





?>