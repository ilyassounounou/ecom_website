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
    <title>ecommerce website

    </title>
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

    body{
      overflow-x: hidden;
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

        <li class="nav-item">
          <a class="nav-link  " href="#">Total Price:
            <?php
            total_cart_price();
          ?></a>
        </li>

 
     
   

      </ul>

      <form class="d-flex ms-auto " action="search_products.php" method="get">
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
       <nav class=" d-flex justify-content-center align-items-center ">
                <?php
             
               if(!isset($_SESSION['username'])){
                echo "<li class='row container-fluid '>
                <a class='btn ' style='border-radius: 20px; border:2px solid black; color:white; ' href='#' >Welcome Guest</a>

              </li>";
              }else{
                echo "   <div class='row '>
                <a class='btn ' style='border-radius: 20px; border:2px solid black; color:white; ' href='#'>Welcome ".$_SESSION['username']."</a>
              </div>";
              }

                if(!isset($_SESSION['username'])){
                  echo "   <div class='row'>
                  <a class='btn btn-primary' style='border-radius: 20px;' href='./users_area/user_login.php'>Login</a>
                </div>";
                }else{
                  echo "   <div class='row'>
                  <a class='btn btn-primary' style='border-radius: 20px;margin-left:50px;' href='./users_area/logout.php'>Logout</a>
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




  <div id="carouselExampleDark" class="carousel carousel-dark slide mb-3 " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="alpha.jpg" class="d-block w-100" style="max-height: 500px;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p> -->
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="alpha1.jpg" class="d-block w-100 " style="max-height: 500px;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="alpha2.jpg" class="d-block w-100" style="max-height: 500px;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p> -->
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


  
  <!-- fourth child -->
  <div class="row px-1">


    <div class="col-md-10"> 
      <!-- products -->
     <div class="row">
      <!-- adding products -->


                <?php

              getproducts();
              get_unique_categories();
              get_unique_brands();
            
              // $ip = getIPAddress();  
              // echo 'User Real IP Address - '.$ip;  
              // getClientIP();
              
                ?>


<!-- row end -->
</div>
<!-- col end -->
</div>


<div class="col-md-2 bg-secondary p-0 " style="overflow-x: auto; overflow-y: auto; max-height: 765px;">
  <!-- brands -->
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-dark">
      <a href="#" class="nav-link text-light "><h4> Delivry Brand </h4></a>
    </li>
    <?php
      getbrands();
    ?>
  </ul>

  <!-- categories -->
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-dark">
      <a href="#" class="nav-link text-light "><h4>categories </h4></a>
    </li>
    <?php
      getcategories();
    ?>
  </ul>
</div>

</div>








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