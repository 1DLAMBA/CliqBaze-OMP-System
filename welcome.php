<?php

require 'config.php';

if($conn === false) {
    die("Connection Failed: ". mysqli_connect_error());
}

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['fname']) && isset($_POST['re-password'])) {

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);
        $re_pass = validate($_POST['re-password']);
        $name = validate($_POST['fname']);
        $brand = validate($_POST['brand']);
        $email = validate($_POST['email']);
        $user_data = 'uname='. $uname. '&name='. $name;

        if (empty($uname)) {
            header("Location: signup.php?error=User Name is required&$user_data");
            exit();
        }else if(empty($pass)){
            header("Location: signup.php?error=Password is required&$user_data");
            exit();
        }
        else if(empty($re_pass)){
            header("Location: signup.php?error=Re Password is required&$user_data");
            exit();
        }
    
        else if(empty($name)){
            header("Location: signup.php?error=Name is required&$user_data");
            exit();
        }
    
        else if($pass !== $re_pass){
            header("Location: signup.php?error=The confirmation password  does not match&$user_data");
            exit();
        }
    
        else{

            $pass = md5($pass);
            
            $sql = "SELECT * FROM users WHERE user_name= '$uname' ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                header("Location: BAS.php?error=The username is taken try another&$user_data");
                exit();
            }else {
                $sql2 = "INSERT INTO users(user_name, password, name, brand, filename, email) VALUES('$uname', '$pass', '$name', '$brand', '$filename', '$email')";
                $result2 = mysqli_query($conn, $sql2);
                if ($result2) {
                    header("Location: login.php?success=Your account has been created successfully");
                    exit();
                  }else {
                    header("Location: welcome.php?error=unknown error occure&$user_data");
                    exit();
                  }
                }
            }
        }else{
            header("Location: welcome.php");
            exit();
        }
    ?>