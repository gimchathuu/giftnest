<?php

include 'config.php';

?>
<html>
<head>
	<title>Orders</title>
   <link rel="stylesheet" href="style.css">

</head>

<body>
<?php 
 include('admipanel.php'); 
 ?>
<br>
<h3>Orders</h3>


<?php

$select = mysqli_query($conn,"SELECT * FROM neworder");
   
?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Phone number</th>
            <th>Address</th>
            <th>Image</th>
            <th>Date</th>
            <th>Payment method</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><img src="uploaded_img/<?php echo $row['image'];?>" height="100" alt=""></td>
            <td><?php echo $row['datereq'];?></td>
            <td><?php echo $row['method'];?></td>
            
            <td>
              <input type="checkbox" name="completed" id="complected"> 
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>

</body> 
</html>