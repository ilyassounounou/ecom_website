<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
        $product_title = $_POST['product_title'];
        $description = $_POST['description'];
        $product_Keywords = $_POST['product_Keywords']; 
        $product_category = $_POST['product_category'];
        $product_brands = $_POST['product_brands'];
        $product_price = $_POST['product_price'];
        $product_status = 'true';
    
        //accessing images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];
 
        //accessing image tmp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        //checking the empty condition
        if($product_title=='' or $description=='' or $product_Keywords=='' or $product_category=='' or $product_brands=='' or $product_price=='' or  $product_image1=='' or $product_image2=='' or $product_image3==''){
            echo " <script>alert('Please fill all the available fields')</script>";
            exit();
        }
        else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            //insert query
            $insert_products = "insert into `products` (product_title,product_description,product_Keywords,category_id,brands_id,product_image1,product_image2,product_image3,product_price,date,status) values('$product_title','$description','$product_Keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')" ;
            $result_query=mysqli_query($connection,$insert_products);
            if($result_query){
                echo "<script>alert('Successfully inserted the product')</script>";
            }
        }
    }
?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product-admin dashbord</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>
 <body class="bg-light">
    <div class="container mt-3">
    <h1 class="text-center">Insert Products</h1>
    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>

        <!-- description -->

        <div class="form-outline mb-4 m-auto">
            <label for="description" class="form-label">description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
        </div>

            <!-- Keywords -->

            <div class="form-outline mb-4 m-auto">
            <label for="product_Keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_Keywords" id="product_Keywords" class="form-control" placeholder="Enter product Keywords" autocomplete="off" required="required">
        </div>


             <!-- categories -->

             <div class="form-outline mb-4 m-auto">
            <select name="product_category" id="" class="form-select">
                <option value="">Select a category</option>


                <?php
                $select_query = "select * from `categories`";
                $result_query = mysqli_query($connection,$select_query);
                while($row = mysqli_fetch_assoc($result_query)){
                    $category_title=$row['category_title'];
                    $category_id=$row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>


        
             <!-- Brands -->

             <div class="form-outline mb-4 m-auto">
            <select name="product_brands" id="" class="form-select">
                <option value="">Select a brands</option>


                <?php
                $select_query = "select * from `brands`";
                $result_query = mysqli_query($connection,$select_query);
                while($row = mysqli_fetch_assoc($result_query)){
                    $brands_title=$row['brands_title'];
                    $brands_id=$row['brands_id'];
                    echo "<option value='$brands_id'>$brands_title</option>";
                }
                ?>
            </select>
        </div>


                  <!-- image 1 -->

                  <div class="form-outline mb-4 m-auto">
            <label for="product_imagae1" class="form-label">Product image 1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control"  required="required">
        </div>

                   <!-- image 2 -->

                   <div class="form-outline mb-4 m-auto">
            <label for="product_image2" class="form-label">Product image 2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control"  required="required">
        </div>

                   <!-- image 3 -->

                   <div class="form-outline mb-4 m-auto">
            <label for="product_image3" class="form-label">Product image 3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control"  required="required" >
        </div>

               <!-- price -->

               <div class="form-outline mb-4 m-auto">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
        </div>


        <div class="form-outline mb-4 m-auto">
         <input type="submit" name="insert_product" class="btn btn-dark text-light mb-3 px-3" value="Insert Products">
        </div>
    </form>
    </div>




















 <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
 </body>
 </html>