<?php

require 'config.php';

if($conn === false) {
    die(" Connection Failed: ". mysqli_connect_error());
}

// Check if form was submitted
if (isset($_POST['submit'])) {
    // Get user input
    $username = $_POST['uname'];
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($password)) {
        echo "Please enter both username and password";
    } else {
        // Hash password
        $hashed_password = md5($password);

        // Query database to check if user exists
        $query = "SELECT * FROM daniel_users WHERE user_name='$username' AND password='$hashed_password'";
        $result = mysqli_query($conn, $query);

        // Check if query was successful and if user exists
        if ($result && mysqli_num_rows($result) == 1) {
            // User exists, redirect to dashboard or home page
            header("Location: dashboard.php");
            exit();
        } else {
            // User does not exist, display error message
            echo "Invalid username or password";
        }
    }
}
?>