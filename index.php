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
<link rel="stylesheet" href="css/index.css">
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
    <div id="inventory-wrapper">
        <div class="inventory-container">
            <?php
                $productQuery = mysqli_query($dbCon, "SELECT * FROM product");

                while($row = mysqli_fetch_array($productQuery)){
                    echo '
                        <div class="product-box">
                            <img src="'.$row['image'].'">
                            <div>
                                <a href="product-detail.php?product_id='.$row['product_id'].'">'.$row['brand'].' '.$row['name'].' '.$row['weight'].'gm</a>
                                <span>&#2547;'.$row['price'].'</span>
                                <button>Add to Cart</button>
                            </div>
                        </div>
                    ';
                }
            ?>  
        </div>
        <div>
            <h3 id="recently-viewed-header">Recently Viewed Product</h3>
        </div>
        <div class="recently-viewed">
            <?php
                if(isset($_COOKIE['recentlyViewedProduct'])){
                    $productQuery = mysqli_query($dbCon, "SELECT * FROM product WHERE product_id in (".$_COOKIE['recentlyViewedProduct'].")");  
                
                    while($row = mysqli_fetch_array($productQuery)){
                        echo '
                            <div class="product-box">
                                <img src="'.$row['image'].'">
                                <div>
                                    <a href="product-detail.php?product_id='.$row['product_id'].'">'.$row['brand'].' '.$row['name'].' '.$row['weight'].'gm</a>
                                    <span>&#2547;'.$row['price'].'</span>
                                    <button>Add to Cart</button>
                                </div>
                            </div>
                        ';
                    }
                }
            ?>
        </div>
    </div>
</section>

<?php
require 'include/footer.html';
?>