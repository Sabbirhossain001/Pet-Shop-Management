<?php
require 'include/header.php';
?>

<script>
    window.addEventListener("load", function(){
        header_function("Blog");
    });
</script>

<link rel="stylesheet" type="text/css" href="css/blog.css">
<section id="main">
    <h3> Blogs </h3>
    <div class='blog-container'>
    <?php
        date_default_timezone_set('Asia/Dhaka');
        
        $item = 0;
        $img_src = "https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/nala-cat-animals-to-follow-on-instagram-1568303427.jpg";
        while($item < 4){
            $item++;
            echo "
                <div class='blog-box'>
                    <img src='".$img_src."'>
                    <div>
                        <h6>This is Header for Blog Item ".$item."</h6>
                        <span>".date("d M Y")."</span>
                        <p>This is the content of Blog Item ".$item.".
                        <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Mus mauris vitae ultricies leo integer malesuada nunc vel risus. Eu lobortis elementum nibh tellus molestie nunc non. Laoreet 
                        sit amet cursus sit amet dictum sit amet.
                        </p>
                        <a href='#'>Read more &gt</a>
                    </div>
                </div>
            ";
        }?>        
    </div>
    
</section>

<script>
    window.onload = header_function("Blog Section");
</script>

<?php
require 'include/footer.html';
?>