<?php

require 'config.php';


   
     

  
        

    
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $productdesc = $_POST['pdesc'];
    $uname = $_SESSION['username'];
    

    $filename = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    
  

$upload_path = "image/".$filename;
move_uploaded_file($file_tmp, $upload_path);



if(isset($_POST['upload'])){

    $sql = "SELECT brand FROM daniel_users WHERE username = '$uname'";
    $result1 = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result1);

    $brand = $row['brand'];

    $query = "INSERT INTO daniel_contents (productname, filename, productprice, username, productdesc, brandn) VALUES ('$productname', '$filename', '$price', '$uname', '$productdesc', '$brand')";
    $result =  mysqli_query($conn, $query);
    if($result) {
        echo "<script>window.alert('Uploaded Succesfully') </script>";
        header("location:brand.php");
    }

    
}
    


?>