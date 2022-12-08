<?php
require 'include/header.php';
?>

<script>
    window.addEventListener("load", function(){
        header_function("Dashboard");
    });
</script>

<link rel="stylesheet" href="css/side-nav.css">
<link rel="stylesheet" href="css/dashboard.css">
<section id ="main">
    <div class="side-nav">
        <a href="order-history.php">Order History</a>
        <a href="vet-appointment-history.php">Vet Appointment History</a>
    </div>
    <div id="stats-container">
        <div class="stats-items">
            <div class="stats-item-digit"><?php echo"0";?></div>
            <div class="stats-item-caption" style="padding: 10px 0;"> Orders Placed Today</div>
        </div>
        <div class="stats-items">
            <div class="stats-item-digit"><?php echo"0";?></div>
            <div class="stats-item-caption"> Vet Appointment Made Today</div>
        </div>
    </div>
</section>

</body>
</html>