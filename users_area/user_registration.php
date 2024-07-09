<?php
include('../includes/connect.php'); 
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    

<div class="container-fluid my-3">
<h2 class="text-center">New User</h2>
<div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
       
        <form action="" method="post" enctype="multipart/form-data">
             <!-- usename -->
            <div class="form-outline mb-4">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" id="user_username" class="form-control" placeholder="entrer votre nom" autocomplete="off" require="require" name="user_username">
            </div>
        <!-- email -->
            <div class="form-outline mb-4">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" id="user_email" class="form-control" placeholder="entrer votre email" autocomplete="off" require="require" name="user_email">
            </div>

                  <!-- iamge -->
                  <div class="form-outline mb-4">
            <label for="user_image" class="form-label">User image</label>
            <input type="file" id="user_image" class="form-control"  require="require" name="user_image">
            </div>

                  <!-- password -->
                  <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" id="user_password" class="form-control" placeholder="entrer votre password" autocomplete="off" require="require" name="user_password">
            </div>

                  <!-- confirm password -->
                  <div class="form-outline mb-4">
            <label for="conf_user_password" class="form-label">Confirme password</label>
            <input type="password" id="conf_user_password" class="form-control" placeholder="Confirmer votre password" autocomplete="off" require="require" name="conf_user_password">
            </div>

                    <!-- Address -->
                    <div class="form-outline mb-4">
            <label for="user_address" class="form-label">Adress </label>
            <input type="text" id="user_address" class="form-control" placeholder="Entrer votre address" autocomplete="off" require="require" name="user_address">
            </div>      
            
                       <!-- contact -->
                       <div class="form-outline mb-4">
            <label for="user_contact" class="form-label">Contact </label>
            <input type="text" id="user_contact" class="form-control" placeholder="Entrer votre nombre de telephone" autocomplete="off" require="require" name="user_contact">
            </div> 

            <div class="mt-4 pt-2">
            <input type="submit" value="Register" class="bg-dark py-2 px-3 text-light border-0" name="user_register">
            <p class="small fw-bold d-flex justify-content-center align-items-center">Arlead have an account? <a  href="user_login.php" class="text-danger text-decoration-none">Login</a></p>
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
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

    //select query

    $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($connection,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert(' username or email ra deja kayn  ')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('maxi nafs lcode')</script>";
    }
    else{
   //insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="insert into `user_table` (username,user_email,user_password,user_image,User_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($connection,$insert_query);
}
        //selecting cart items

        $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
        $result_cart=mysqli_query($connection,$select_cart_items); 
        $rows_count=mysqli_num_rows($result_cart);
        if($rows_count>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('you have item in you cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('../first.php','_self')</script>";
        }
    // if($sql_execute){
    //     echo "<script>alert('Data inserted successfully')</script>";
    // }  

    }
 


?>