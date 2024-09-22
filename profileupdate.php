<?php
require 'config.php';


$desc = $_POST['desc'];
$dp = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]['tmp_name'];
    $folder = "./image/" . $dp;
$backdp = $_FILES['uploadbackfile']['name'];
    $tempname2 = $_FILES['uploadbackfile']['tmp_name'];
    $folder2 = "./image/" . $backdp;
    $uname = $_SESSION['username'];

if(isset($_POST['upload'])){
    $sql = "INSERT INTO usercont (pagedesc, filename, pagecover, username) VALUES ('$desc', '$dp', '$backdp', '$uname')";
    if($conn->query($sql) === TRUE) {
        echo "<script>window.alert('Uploaded Succesfully') </script>";
        header("location:brand.php");
    }

    
}

?>

