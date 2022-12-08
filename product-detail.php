<?php
require 'include/header.php';
include 'include/mysqlConnection.php';
?>

<script>
    window.addEventListener("load", function(){
        header_function("Paw Care");
    });
</script>

<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/product-detail.css">
<section id ="main">
    <div class="side-nav">
    <?php
        $category = 0;
        while($category < 10){
            $category++;
            echo '<a href="">Category '.$category.'</a>';
        } 
    ?>
    </div>

    <div class="product-detail">
        <?php

    if(!isset($_COOKIE['recentlyViewedProduct']))
        setcookie("recentlyViewedProduct", $_GET['product_id']);
    else
        setcookie("recentlyViewedProduct", $_COOKIE['recentlyViewedProduct'].",".$_GET['product_id']);
    
        $product_id = $_GET['product_id'];
        $productQuery = mysqli_query($dbCon, "SELECT * FROM product WHERE product_id='$product_id'");

        while($row = mysqli_fetch_array($productQuery)){
            echo '
                <div class="image-section">
                    <img src="'.$row['image'].'">
                </div>
                <div class="text-section">
                    <div class="text-content">
                        <h6>'.$row['brand'].' '.$row['name'].' '.$row['weight'].'gm<h6>
                        <span>&#2547;'.$row['price'].'</span>
                        <div class="description">'.$row['description'].'</div>
                    <div>
                </div>
            ';
        }
        
        ?> 

        
  
    </div>
</section>

<?php
require 'include/footer.html';
?>