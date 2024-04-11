<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>ORDER</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">

        .gallery-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 50px 0;
        }
        form{
            border: 2px solid #ccc;
            border-radius: 25px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.5); 
        }

        .gallery {
            width: 350px;
            height: 350px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin: 50px;
            
        }

        .gallery img {
            height: 300px;
            object-fit: cover;
            margin-bottom: 10px;
            width: auto;
            text-align: center;
            margin: 0 auto;
            display: block;
            border-radius: 25px;
        }

        .gallery p, .gallery h3, .gallery h6 {
            text-align: center;
            margin: 0;
        }
        .gallery h6{
            font-size: 22px;
        }
        .gallery:hover {
    
            transform: translate(0px, -8px);
            transition: .6s;
         }
        .gallery button {
            text-align: center;
            font-size: 24px;
            color: #fff;
            width: 100%;
            padding: 15px;
            border: 0;
            outline: none;
            cursor: pointer;
            margin-top: 5px;
            border-bottom-right-radius: 25px;
            border-bottom-left-radius: 25px;
        }

        .buy-1 {
            background-color: #bd5e78;
        }

    </style>
</head>
<?php
include('header.html');
?>
<body>
<div class="gallery-row">

    <?php
    $select_products = mysqli_query($conn, "SELECT * FROM product");
    if(mysqli_num_rows($select_products) > 0){
        while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>

            <div class="gallery">
                <form action="orderform.php" method="post">
                    <div class="content">
                        <img src="Admin/uploaded_img/<?php echo $fetch_product['product_image']; ?>" alt="">
                        <p><?php echo $fetch_product['id']; ?></p>
                        <h3><?php echo $fetch_product['product_name']; ?></h3>
                        <h6>RS.<?php echo $fetch_product['product_price']; ?>/-</h6>

                        <button type="submit" class="buy-1" name="order_now">Order Now</button>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['product_price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['product_image']; ?>">
                    </div>
                </form>
            </div>

            <?php
        }
    }
    ?>

</div>

</body>
<?php
include('footer.html');
?>
</html>
