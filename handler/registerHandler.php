<?php 

    include('../include/mysqlConnection.php');

    $response = array();

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($dbCon, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user){

        $response['success'] = FALSE;
        $response['errorMsg'] = array();

        if($user['email'] === $email) {
            $response['errorMsg']['email'] = "You already have an account";
        }
        
        elseif($user['username'] === $username) {
            $response['success'] = FALSE;
            $response['errorMsg']['username'] = "This username already exists";
        }
    }
    else 
        $response['success'] = TRUE;
    

    if($response['success']){
        $password = md5($password);

        $query = "INSERT INTO user (email, username, password) VALUES ('".$email."', '".$username. "', '".$password."')";
        mysqli_query($dbCon, $query);
    }
    
    echo json_encode($response);

    
?>
