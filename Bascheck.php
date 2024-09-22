<?php

require 'config.php';


if(isset($_POST['upload'])){
    if (isset($_SESSION['username'])) {

    $username = $_POST['username'];
    //escapes special characters in a string

        $brand    = stripslashes($_REQUEST['brand']);
        $brand    = mysqli_real_escape_string($conn, $brand);
        $desc    = stripslashes($_REQUEST['desc']);
        $desc    = mysqli_real_escape_string($conn, $desc);
        $create_datetime = date("Y-m-d H:i:s");
         //user profile image
         $filename = $_FILES['image']['name'];
         $file_tmp = $_FILES['image']['tmp_name'];
         $file_type = $_FILES['image']['type'];
         $file_size = $_FILES['image']['size'];
         $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
         
         $extensions= array("jpeg","jpg","png");
         
         if(in_array($file_ext,$extensions)=== false){
             echo "Extension not allowed, please choose a JPEG or PNG file.";
         }
         
         if($file_size > 2097152) {
             echo 'File size must be less than 2 MB';
         }
         
         $upload_path = "image/".$filename;
         move_uploaded_file($file_tmp, $upload_path);
         echo "Success";
     
         //Image cover
         $filename2 = $_FILES['imagecover']['name'];
         $file_tmp2 = $_FILES['imagecover']['tmp_name'];
         $file_type2 = $_FILES['imagecover']['type'];
         $file_size2 = $_FILES['imagecover']['size'];
         $file_ext2=strtolower(end(explode('.',$_FILES['image']['name'])));
         
         $extensions2= array("jpeg","jpg","png");
         
         if(in_array($file_ext2,$extensions2)=== false){
             echo "Extension not allowed, please choose a JPEG or PNG file.";
         }
         
         if($file_size > 2097152) {
             echo 'File size must be less than 2 MB';
         }
         
         $upload_path2 = "image/".$filename2;
         move_uploaded_file($file_tmp2, $upload_path2);
         echo "Success";
             
            
             
            
             
             
             
                 $query    = "INSERT into `userprof` (username, create_datetime, filename, pagedesc, pagecover, brand)
                          VALUES ('$username', '$create_datetime', '$filename', '$desc', '$filename2', '$brand')";
              $result   = mysqli_query($conn, $query);
             if ($result) {
                 echo "<div class='form'>
                       <h3>Your profile has been set up successfully.</h3><br/>
                       <p class='link'>Click here to proceed <a href='login.php'>Login</a></p>
                       </div>";
             } else {
                 echo "<div class='form'>
                       <h3>Required fields are missing.</h3><br/>
                       <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                       </div>";
             }
            }};

?>