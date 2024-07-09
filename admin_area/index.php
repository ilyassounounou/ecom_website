<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashbord</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .admin_image{
            width: 100px;
            object-fit: contain;
        }

        .footer{
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <img src="../eco.png" alt="" class="logo">

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a href="" class="nav-link text-light">Welcome</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-4">
                    <a href="#"><img src="../face1.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin name</p>
                </div>

                <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php " class="nav-link text-light bg-dark my-1">Insert Products</a></button>

                    <button><a href="" class="nav-link text-light bg-dark my-1">View Products</a></button>

                    <button><a href="index.php?insert_category" class="nav-link text-light bg-dark my-1">Insert Categories</a></button>

                    <button><a href="" class="nav-link text-light bg-dark my-1">View Categories</a></button>

                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-dark my-1">Insert Brands</a></button>

                    <button><a href="" class="nav-link text-light bg-dark my-1">View Brands</a></button>

                    <button><a href="" class="nav-link text-light bg-dark my-1">All order</a></button>

                    <button><a href="" class="nav-link text-light bg-dark my-1">All payments</a></button>

                    <button  class="my-3"><a href="" class="nav-link text-light bg-dark my-1">List User</a></button>

                    <button><a href="" class="nav-link text-light bg-dark my-1">Logout</a></button>

                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
                    <?php  

    if(isset($_GET['insert_category'])){
    include('insert_categories.php');
            }

            if(isset($_GET['insert_brands'])){
                include('insert_brands.php');
                        }

                    ?>
        </div>
        <!-- last child -->
        <div class="bg-dark text-light text-center footer p-1 ">
  <p>All rights reserved -Designed by ilyass-2023</p>
</div>
    </div>












    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
</body>
</html>