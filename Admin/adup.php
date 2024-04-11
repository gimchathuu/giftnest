<?php
include 'config.php';
if(isset($_POST['addnow'])){

   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   if( empty($image)){
      echo "<script>alert('please fill out all')</script>";
   }else{
      $insert = "INSERT INTO advertisment(image) VALUES('$image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         echo "<script>alert('new advertisment added successfully')</script>";
         move_uploaded_file($image_tmp_name, $image_folder);
         
      }else{
         echo "<script>alert('could not add the advertisment')</script>";
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM advertisment WHERE id = $id");
   header('location:adup.php');
};

?>
<html>
<head>
	<title>advertisment upload</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   
<?php 
 include('admipanel.php'); 
 ?>
  <br>
   <br>
   <br>
   <br>
   <br>
<div class="container">

   <div class="admin-product-form-container">

      <form action="" method="post" enctype="multipart/form-data">
         <h3>Add a new advertisment</h3>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" class="box">
         <input type="submit" class="btn" name="addnow" value="Add Now">
      </form>

   </div>

<?php

$select = mysqli_query($conn,"SELECT * FROM advertisment");
   
?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Id</th>
            <th>image</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['id'];?></td>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            
            <td>
               <a href="adup.php ?delete=<?php echo $row['id']; ?>" class="btn">delete </a> 
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>

</body> 
</html>