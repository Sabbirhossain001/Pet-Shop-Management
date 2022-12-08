<?php
require 'include/header.php';
if (isset($_SESSION['user']))
    header('location: index.php');
?>

<script>
    window.addEventListener("load", function(){
        header_function("Sign-Up");
    });
</script>

<link rel="stylesheet" href="css/login_reg.css">
<script src="js/register.js"></script>
<section id ="main">
    <div class="form-container">
        
        <form>
            <h3 class="title">register now</h3>
            
            <input type="email" name="email" placeholder="Enter your email" class="box" required><span name="email"></span>
            <input type="username" name="username" placeholder="Enter your username" class="box" required><span name="username"></span>
            <input type="password" name="password" placeholder="Enter your password" class="box" required>
            <input type="password" name="password2" placeholder="Confirm your password" class="box" required><span name="password"></span>
            <input type="submit" value="register now" id="form-btn" name="submit">
            <p>Already have an account? <a href="login.php<?php if(isset($_GET['next'])) echo '?next='.$_GET['next'];?>">login now!</a></p>
        </form>

    </div>
</section>

<?php
require 'include/footer.html';
?>

<!-- action="handler/server.php" method="post" -->