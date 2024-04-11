<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Advertisment</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
    .image {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50%;
  margin-bottom:25px;
}

.imgv {
  width: 40%;
  height: 40%;
}
    </style>
</head>
<body>
    <?php 
 include('header.html'); 
 ?>
 <?php
      
      $select_image = mysqli_query($conn, "SELECT * FROM advertisment");
      if(mysqli_num_rows($select_image) > 0){
         while($fetch_image = mysqli_fetch_assoc($select_image)){
      ?>
        <div class="image"><img src="Admin/uploaded_img/<?php echo $fetch_image['image']; ?>" alt="" class="imgv"></div>
    </div>
    <?php
         };
      };
      ?>
    <?php 
 include('footer.html'); 
 ?>
</body>
</html>