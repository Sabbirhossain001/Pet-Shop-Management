<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/pop-up-box.css">
    <script src="js/header.js"></script>
</head>
<body>
    <header>
        <div id="top-nav-upper">
            <div class="nav-container">
                <div class="top-nav-items"><a href="">VET CARE</a></div>
                <div class="top-nav-items"><a href="forum.html">FORUM</a></div>
                <div class="top-nav-items"><a href="blog.php">BLOG</a></div>
                <?php 
                    if (isset($_SESSION['user']))
                        echo '<div class="top-nav-items" id="auth-placeholder"><a href="profile.php">'.strtoupper($_SESSION['user']).'\'S PROFILE</a></div>';
                    else
                        echo '<div class="top-nav-items" id="auth-placeholder"><a href="login.php?next=index.php">LOGIN</a></div>';
            
            ?>
            </div>
        </div>
        <div id="top-nav-lower">
            <div class="nav-container">
                <div id="ps-logo"><i class="fa fa-paw" aria-hidden="true"></i> Paw Care</div>
                <form>
                    <input type="search" name="search" placeholder="Search in Paw Care">
                    <button>&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
                </form>
            </div>
        </div>
    </header>
    
