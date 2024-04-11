<?php

include 'config.php';

?>

<?php 
 include('admipanel.php'); 
 ?>
 <?php
include 'config.php';
if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO product(product_name, product_price, product_image) VALUES('$product_name', '$product_price', '$product_image')";

      $upload = mysqli_query($conn, $insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM product WHERE id = $id");
   header('location:admin.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Orders</title><
   <style>
      .col-2 h1{
   font-size:90px;
   line-height:60px;
}
</style>
<link rel="stylesheet" href="style.css">
</head>

<body>
   <br>
   <br>
   <br>
   <br>
   <br>
<div class="container">

   <div class="admin-product-form-container">

      <form action="" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="Enter product name" name="product_name" class="box">
         <input type="number" placeholder="Enter product price" name="product_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="Add product">
      </form>

   </div>

<?php

$select = mysqli_query($conn,"SELECT * FROM product");
   
?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Id</th>
            <th>product name</th>
            <th>product price</th>
            <th>product image</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td>RS.<?php echo $row['product_price']; ?>/-</td>
            <td><img src="uploaded_img/<?php echo $row['product_image']; ?>" height="100" alt=""></td>
            
            <td>
               <a href="admin.php ?delete=<?php echo $row['id']; ?>" class="btn">delete </a> 
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>