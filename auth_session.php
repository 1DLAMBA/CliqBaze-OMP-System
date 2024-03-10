<?php
   
    if(!isset($_SESSION["username"]) && !isset($_SESSION["brand"]) ) {
        header("Location: login.php");
        exit();
    }
    
?>