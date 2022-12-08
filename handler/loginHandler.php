<?php

    include('../include/mysqlConnection.php');

    $response = array();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $results = mysqli_query($dbCon, $query);

    if(mysqli_num_rows($results) == 1) {
        $response['success'] = TRUE;
        $user = mysqli_fetch_assoc($results);
        
        $sql = "UPDATE user SET last_login=CURRENT_TIMESTAMP WHERE email = '$email'";
        mysqli_query($dbCon,$sql);

        $_SESSION['user'] = $user['username'];
        $_SESSION['userId'] = $user['user_id'];
        
    }
    else {
        $response['success'] = FALSE;
        $response['errorMsg'] = "Wrong email/password";
    }

    echo json_encode($response);
?>