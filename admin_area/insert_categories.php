<?php

    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
       $category_title = $_POST['cat_title'];

      // Assuming $connection is your database connection object

// Check if the category already exists
$select_query = "SELECT * FROM categories WHERE category_title = ?";
$stmt = $connection->prepare($select_query);
$stmt->bind_param("s", $category_title);
$stmt->execute();
$stmt->store_result();
$number = $stmt->num_rows;
$stmt->close();

if ($number > 0) {
    echo "<script>alert('This category is already in the database')</script>";
} else {
    // If the category doesn't exist, insert it
    $insert_query = "INSERT INTO categories (category_title) VALUES (?)";
    $stmt = $connection->prepare($insert_query);
    $stmt->bind_param("s", $category_title);

    if ($stmt->execute()) {
        echo "<script>alert('Category has been inserted successfully')</script>";
    } else {
        echo "<script>alert('Error inserting category')</script>";
    }

    $stmt->close();
}



     }

  
?>


<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 m-auto">

  <input type="Submit" class="p-1 border-0 my-3 bg-dark text-light" name="insert_cat" value="Insert Categories">

  <!-- <button class=" bg-dark text-light p-1 border-0 my-3" >Insert Categories</button> -->
</div>
</form>