<?php

include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce website-cart details</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
      :root{
    --dark-color:#19283f;
    --green-color:#33d1cc;

}
.navbar{
background-color: var(--dark-color);
}

.navbar .navbar-nav .nav-link{
  color: white;
}
.navbar .navbar-nav .nav-link.active,
.navbar .navbar-nav .nav-link:focus,
.navbar .navbar-nav .nav-link:hover{

  color:var(--green-color);
}
.navbar .navbar-toggler{
  color: white;
  font-size: 25px;
  border-color: white;
}

.navbar .navbar-toggler:focus{
  box-shadow: none;
}

.bob{
  display: flex;
      justify-content: center;
      align-items: center;
      margin-left: 20px;
}

    .carousel-inner img {
      object-fit: contain;
    
    }

    .responsive-image {
    width: 100%;
    height: 100px;
    object-fit: contain;
}

  



    </style>
    
</head>
<body>

    
    <div class="container-fluid p-0">

    <nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <img src="eco.png" alt="" class="logo">

    <button
    class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

    <i class="fa-solid fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav justify-content-center align-items-center  flex-grow-1 ">
      
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="first.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="display_all.php">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="./users_area/user_registration.php">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="#">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light " href="cart.php">
          <i class="fa fa-cart-shopping "></i>
          <sup>
            <?php
            cart_item();
            ?>
          </sup>
          </a>
        </li>
      </ul>

    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
  cart();

?>
<!-- seconde child -->



<nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container-fluid">
       <nav class="row d-flex justify-content-center align-items-center">
                <?php
              if(!isset($_SESSION['username'])){
                echo "<li class='row'>
                <a class='btn ' style='border-radius: 20px; border:2px solid black; color:white;' href='#' >Welcome Guest</a>

              </li>";
              }else{
                echo "   <div class='row'>
                <a class='btn ' style='border-radius: 20px; border:2px solid black; color:white;' href='#'>Welcome ".$_SESSION['username']."</a>
              </div>";
              }

                if(!isset($_SESSION['username'])){
                  echo "   <div class='row'>
                  <a class='btn btn-primary' style='border-radius: 20px;' href='./users_area/user_login.php'>Login</a>
                </div>";
                }else{
                  echo "   <div class='row'>
                  <a class='btn btn-primary' style='border-radius: 20px;' href='./users_area/logout.php'>Logout</a>
                </div>";
                }
                ?>
      </nav>

 
        </nav>

  <!-- third child -->
  <div class="bg-light">
    <h3 class="text-center">Hidden Stor</h3>
    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
  </div>





<div class=" container table-responsive">
  <form action="" method="post">
    <table class="table table-bordered border-dark table-hover text-center text-capitalize">
      
       
        <tbody>
          <!-- php code to display dinamique data -->

          <?php
          
          //global $connection;
          $get_ip_address = getIPAddress();  
          $total_price=0;
          $cart_query="Select * from  `cart_details` where ip_address= '$get_ip_address'";
          $result=mysqli_query($connection,$cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0){
              echo "      <thead>
              <tr class='table-dark table-active text-uppercase'>
                  <th style='min-width: 150px;'>Product Title</th>
                  <th style='min-width: 150px;'>Product Image</th>
                  <th style='min-width: 100px;'>Quantity</th>
                  <th style='min-width: 150px;'>Total Price</th>
                  <th style='min-width: 100px;'>Remove</th>
                  <th style='min-width: 150px;' colspan='2'>Operations</th>
              </tr>
          </thead>
         
          <tbody>";
          
          while($row=mysqli_fetch_array($result)){
              $product_id=$row['product_id'];
              $select_products="Select * from `products` where product_id='$product_id'";
              $result_products=mysqli_query($connection,$select_products);
              while($row_product_price=mysqli_fetch_array($result_products)){
                  $product_price=array($row_product_price['product_price']);
                  $price_table=$row_product_price['product_price'];
                  $product_title=$row_product_price['product_title'];
                  $product_image1=$row_product_price['product_image1'];
                  $product_values=array_sum($product_price);
                  $total_price+=$product_values;
         
          ?> 
            <tr>
                <td><?php echo $product_title?></td>
                <td><img class="responsive-image" src="./admin_area/product_images/<?php echo $product_image1?>" alt=""></td>
                <td><input type="text" name="qty" class="form-input w-50"></td>
                <?php
                $get_ip_address = getIPAddress(); 
                if(isset($_POST['update_cart'])){
                  $quantities=$_POST['qty'];
                  $update_cart="Update `cart_details` set quantity=$quantities where ip_address='$get_ip_address'";
                  $result_products_quantity=mysqli_query($connection,$update_cart);
                  $total_price=$total_price * $quantities;
                }
                
                ?>
                <td><?php echo $price_table?></td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                <td>
                   <!-- <button class="bg-danger p-1 text-white border-0 mr-4 px-2 mb-3 rounded-3">Update</button> -->
                    <input type="submit" name="update_cart" id="" value="Update Cart" class="bg-danger p-1 text-white border-0 mr-4 px-2 mb-3 rounded-3">
                   <!-- <button class="bg-danger p-1 text-white border-0 mr-4 px-2 rounded-3">Remove</button> -->
                   <input type="submit" name="remove_cart" id="" value="Remove Cart" class="bg-danger p-1 text-white border-0 mr-4 px-2 mb-3 rounded-3">
                </td>
            </tr>

            <?php
             } 
              }
            }
            else{
              echo
            "<h2 class='text-center text-danger'> Cart is empty</h2>";}
            ?>

        </tbody>
    </table>
    <!-- subtotal -->
    <div class="">
      <?php
         $get_ip_address = getIPAddress();  
        
         $cart_query="Select * from  `cart_details` where ip_address= '$get_ip_address'";
         $result=mysqli_query($connection,$cart_query);
         $result_count=mysqli_num_rows($result);
         if($result_count>0){
          echo "   <h4 class='px-3'>SubTotal: <strong class='text-danger'>$total_price DH</strong> </h4>

          <input type='submit' name='continue_shopping' id='' value='continue Shopping' class='bg-dark p-1 text-white border-0 mr-4 px-2 mb-3 rounded-3'>
           
      <button class='bg-danger p-1  border-0 ml-4 mb-4'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
         }
         else{
          echo   "  <input type='submit' name='continue_shopping' id='' value='continue Shopping' class='bg-dark p-1 text-white border-0 mr-4 px-2 mb-3 rounded-3'>";
         }
         if(isset($_POST['continue_shopping'])){
          echo "<script>window.open('first.php','_self')</script>";
         }
      ?>
     
    </div>
</div>
</form>

  
<!-- function to remove items -->

<?php
function remove_cart_item(){
  global $connection;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($connection,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item=remove_cart_item();


?>






<!-- last child -->
  <?php
  
   include("./includes/footer.php")
  
  ?>

  </div>






    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
</body>
</html>