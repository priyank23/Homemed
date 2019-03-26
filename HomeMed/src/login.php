<?php
    //connect to database
    $db = mysqli_connect("localhost","phpmyadmin","phpmyadmin","homemed");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    if(isset($_POST['login-btn'])) {
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM users";
        $result = mysqli_query($db,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)) {
                //echo $row['email'];
                //echo $email;
                if($email == $row['email']){
                    if($password == $row['password']){
                        $_SESSION['message'] = "you are logged in";
                        $_SESSION['username'] = $username;
                        header("location: pages/home/home.html");
                        exit();
                    }
                    else{
                        echo "Authentication failed !";
                    }
                    break;
                }
            }

            echo "User account not found !";
        }
        
        
    } 

?>

