<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    .payment_img{
        width: 90%;
        margin: auto;
        display: block ;
    }
</style>
<body>
    <!-- php code to accese user id -->
    <?php
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($connection,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    
    
    
    ?>
    <div class="container">
    <h2 class="text-center text-dark">Payment Options</h2>
    <div class="row d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6">
           <a href="https://www.paypal.com" target="_blank"><img src="../images/paypal.png" alt="" class="payment_img"></a>
        </div>

        <div class="col-md-6">
           <a href="order.php?user_id=<?php echo $user_id ?>" target="_blank"><h2 class="text-center">Payment offline</h2></a>
        </div>
    </div>
    </div>















    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
</body>
</html> 