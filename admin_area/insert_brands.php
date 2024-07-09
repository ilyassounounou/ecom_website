<?php

    include('../includes/connect.php');
    if(isset($_POST['insert_brand'])){
       $brands_title = $_POST['brand_title'];

      // Assuming $connection is your database connection object

// Check if the category already exists
$select_query = "SELECT * FROM brands WHERE brands_title = ?";
$stmt = $connection->prepare($select_query);
$stmt->bind_param("s", $brands_title);
$stmt->execute();
$stmt->store_result();
$number = $stmt->num_rows;
$stmt->close();

if ($number > 0) {
    echo "<script>alert('This category is already in the database')</script>";
} else {
    // If the category doesn't exist, insert it
    $insert_query = "INSERT INTO brands (brands_title) VALUES (?)";
    $stmt = $connection->prepare($insert_query);
    $stmt->bind_param("s", $brands_title);

    if ($stmt->execute()) {
        echo "<script>alert('Brands has been inserted successfully')</script>";
    } else {
        echo "<script>alert('Error inserting Brands')</script>";
    }

    $stmt->close();
}



     }

  
?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1">
</div>
 
<div class="input-group w-10 mb-2 m-auto">

  <input type="Submit" class=" bg-dark text-light p-2 border-0 my-3" name="insert_brand" value="Insert Brands">

</div>
</form>