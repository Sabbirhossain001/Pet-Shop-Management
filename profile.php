<?php
require 'include/header.php';
?>

<script>
    window.addEventListener("load", function(){
        header_function("Profile");
    });
</script>

<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/dashboard.css">
<section id ="main">
    <div class="side-nav">
    <a href="order-history.php">Order History</a>
        <a href="vet-appointment-history.php">Vet Appointment History</a>
    </div>
    
</section>
<?php
require 'include/footer.html';
?>