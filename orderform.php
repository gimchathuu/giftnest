<?php 
include ('config.php');

if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $datereq = $_POST['datereq'];
    $paymeth = $_POST['method'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'Admin/uploaded_img/'.$image;

    if(empty($name) ||  empty($phone) ||empty($address) ||empty($datereq)||empty($paymeth))
    {
        echo "<script>alert('Please fill in any missing fields!')</script>";
    }
    else {
$sql ="INSERT INTO neworder(`name`, `phone`, `address`,`image`,`datereq`, `method`)  VALUES ('$name','$phone','$address','$image','$datereq','$paymeth')";
$upload=(mysqli_query($conn,$sql));
if($upload)
{
    echo "<script>alert('Wow! User Order Is Completed.')</script>";
    move_uploaded_file($image_tmp_name, $image_folder);
}
else {
    echo "<script>alert('Woops! Something Wrong Went.')</script>";
}
    };


};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ORDER FORM</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Admin/style.css">
    <style>
      .admin-product-form-container p{
        font-size:15px;
      }
  
</style>  
    
</head>
<body>
<?php 
 include('header.html'); 
 ?>
<div class="container">

<div class="admin-product-form-container">
<form action="" method="post" enctype="multipart/form-data">

        <h3>Order your cake</h3>
        <input name="name" type="text" placeholder="Enter your name" class="box"required >
        <input name="phone" type="phone number"  placeholder="Enter your phone number"class="box" required>
        <input name="address"type="text" placeholder="Enter your address" class="box"required>
        <p>Upload your cake image</p>
        <input name="image"type="file" accept="image/png, image/jpeg, image/jpg"  class="box" >
        <input type="text" onfocus="(this.type='date')" name="datereq" id="" placeholder="Date cake required" class="box"required>
        <select name="method">
            <option value="Select payment method" selected disabled>Choose A Payment Method</option>
            <option value="cash on delivery" >Cash on devlivery</option>
            <option value="credit cart">Credit card</option>
        </select>
        <input type="submit" class="btn" value="Order now" name="submit">
    </form>
</div>
</div>

<?php 
 include('footer.html'); 
 ?>

</html>