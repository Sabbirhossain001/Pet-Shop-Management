<?php
require 'include/header.php';
?>

<?php
  if (isset($_POST["submit"])) {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $to = $email;
    $subject = $message;

    $message = "Name: {$username} Email: {$email} Phone: {$phone}  Message: " . $message;

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: rifatul.ovi@northsouth.edu';

    $mail = mail($to,$subject,$message,$headers);

    if ($mail) {
      echo "<script>alert('Mail Send.');</script>";
    }else {
      echo "<script>alert('Mail Not Send.');</script>";
    }
  }
?>

<script src="js/contact-us.js"></script>
<link rel="stylesheet" href="css/contact-us.css">

<br>
<br>
<br>
<div class="contact-form">
  <span class="circle one"></span>
  <span class="circle two"></span>

  <form action="" method="POST" autocomplete="off">
    <h3 class="title">Contact us</h3>
    <div class="input-container">
      <input type="text"  name="name" class="input">
      <label for="">Username</label>
      <span>Username</span>
    </div>
    <div class="input-container">
      <input type="email" name="email" class="input">
      <label for="">Email</label>
          <span>Email</span>
    </div>
    <div class="input-container">
      <input type="tel" name="phone" class="input">
      <label for="">Phone</label>
      <span>Phone</span>
    </div>
    <div class="input-container textarea">
      <textarea name="message" class="input"></textarea>
      <label for="">Message</label>
      <span>Message</span>
    </div>
    <input type="submit" name="submit" value="Send" class="btn" />
  </form>
</div>

<?php
require 'include/footer.html';
?>
