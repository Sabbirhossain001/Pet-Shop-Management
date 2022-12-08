<?php
	// ob_start();
    // ob_end_clean();
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}

	$dbCon = mysqli_connect("localhost", "root", "", "paw care");
	
	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
    }
?>