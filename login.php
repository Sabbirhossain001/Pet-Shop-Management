<?php
require 'include/header.php';
if (isset($_SESSION['user']))
    header('location: index.php');
?>

<script>
    window.addEventListener("load", function(){
        header_function("Login");
    });
    
</script>

<link rel="stylesheet" href="css/login_reg.css">
<script src="js/login.js"></script>
<section id ="main">
<div class="form-container">
        
            <form action="handler/loginHandler.php" method="post"> 
                <h3 class="title">login now</h3>
                
                <input type="email" name="email" placeholder="Enter your email" class="box" required>
                <input type="password" name="password" placeholder="Enter your password" class="box" required><span id="error"></span>
                <input type="submit" value="login now" id="form-btn" name="submit">
                <p>Don't have an account? <a href="register.php<?php if(isset($_GET['next'])) echo '?next='.$_GET['next'];?>">register now!</a></p>
            </form>
        </div>
</section>

<?php
require 'include/footer.html';
?>