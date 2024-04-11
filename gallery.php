<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Gallery</title>
<link rel="stylesheet" href="style.css">
<style>
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, auto));
    gap: 15px;
    padding: 10px;
  }

.gallery img {
    width: 250px;
    height: auto;
    border-radius: 5px;
    transition: transform 0.3s ease;
  }

.gallery img:hover {
    transform: scale(1.05);
  }


</style>
</head>
<body>
    <?php 
            include 'header.html';
    ?>

<div class="gallery">

  <img src="Images/image1.jpg" alt="Image 1">
  <img src="Images/image2.jpg" alt="Image 2">
  <img src="Images/image3.jpeg" alt="Image 3">
  <img src="Images/image4.jpeg" alt="Image 4">
  <img src="Images/image5.jpg" alt="Image 5">
  <img src="Images/image6.jpg" alt="Image 6">
  <img src="Images/image7.jpeg" alt="Image 7">
  <img src="Images/image8.jpeg" alt="Image 8">
  <img src="Images/image9.jpeg" alt="Image 9">
  <img src="Images/image10.jpeg" alt="Image 10">
  <img src="Images/image11.jpeg" alt="Image 11">
  <img src="Images/image12.jpeg" alt="Image 12">
  <img src="Images/image13.jpeg" alt="Image 13">
  <img src="Images/image14.jpeg" alt="Image 14">
  <img src="Images/image15.jpeg" alt="Image 15">
  <img src="Images/image16.jpeg" alt="Image 16">
  <img src="Images/image17.jpeg" alt="Image 17">
  <img src="Images/image18.jpeg" alt="Image 18">
  <img src="Images/image19.jpeg" alt="Image 19">
  <img src="Images/image20.jpeg" alt="Image 20">
  <img src="Images/image21.jpeg" alt="Image 21">
  <img src="Images/image22.jpeg" alt="Image 22">
  <img src="Images/image23.jpeg" alt="Image 23">
  <img src="Images/image24.jpeg" alt="Image 24">
  <img src="Images/image25.jpeg" alt="Image 25">
  <img src="Images/image26.jpeg" alt="Image 26">
  <img src="Images/image27.jpeg" alt="Image 27">
  <img src="Images/image28.jpeg" alt="Image 28">
  <img src="Images/image29.jpeg" alt="Image 29">


</div>
<?php 
            include 'footer.html';
    ?>
</body>
</html>
