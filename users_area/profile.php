<?php

include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome <?php echo $_SESSION['username']?></title>
   
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="../style.css">
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

    body{
      overflow-x: hidden;
    }

    
.profile_img{
    width: 90%;
    /* height: 100%; */
    margin: auto;
    display: block;
    object-fit: contain;

}


    </style>
    
</head>
<body>

    
    <div class="container-fluid p-0">

    <nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <img src="../eco.png" alt="" class="logo">

    <button
    class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

    <i class="fa-solid fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav justify-content-center align-items-center  flex-grow-1 ">
      
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="../first.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../display_all.php">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="profile.php">My Account</a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="#">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light " href="../cart.php">
          <i class="fa fa-cart-shopping "></i>
          <sup>
            <?php
            cart_item();
            ?>
          </sup>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="#">Total Price:
            <?php
            total_cart_price();
          ?></a>
        </li>

 
     
   

      </ul>

      <form class="d-flex ms-auto " action="../search_products.php" method="get">
        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" name="search_data">
  
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
  cart();

?>
<!-- seconde child -->
 



        <!-- first child -->
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
                  <a class='btn btn-primary' style='border-radius: 20px;' href='../users_area/user_login.php'>Login</a>
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

<!-- fourth child -->

<div class="row">
  <div class="col-md-2 ">
          <ul class="navbar-nav bg-secondary text-center" style="height:100vh;">
          <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#"><h4>Your profile</h4></a>
        </li>
              <?php
              $username=$_SESSION['username'];
              $user_image="Select * from `user_table` where   username='$username'";              
              $result_image=mysqli_query($connection,$user_image);
              $row_image=mysqli_fetch_array($result_image);
              $user_image=$row_image['user_image'];
              echo "  <li class='nav-item'>
              <img src='./user_images/$user_image' class='profile_img my-4' alt=''>
             </li>";
              ?>
      
        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php">Pending orders</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?edit_account">Edite account</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?my_orders">My orders</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="logout.php">Logout</a>
        </li>
          </ul>
  </div>
  <div class="col-md-10 ">

    <?php
  get_user_order_details();
  ?>
  </div>
  
</div>




  <?php
  
   include("../includes/footer.php")
  
  ?>

  </div>






    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
</body>
</html>