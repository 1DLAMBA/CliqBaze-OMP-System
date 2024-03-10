<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Home.css? v=<?php echo time(); ?>">
        <link rel="stylesheet" href="BAS.css? v=<?php echo time(); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">
<title>
    Become a seller
</title>
</head>
<body>
<?php
$title = "HOME";
include "header.php";
?>
    
    <div class="main">
        <center><h1>JOIN US</h1><hr></center>
    <div class="inner">


    <?php
    require('config.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['uname'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['uname']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $name    = stripslashes($_REQUEST['fname']);
        $name    = mysqli_real_escape_string($conn, $name);
        $phone    = stripslashes($_REQUEST['phone']);
        $phone    = mysqli_real_escape_string($conn, $phone);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
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
         
         
         if($file_size > 2097152) {
             echo 'File size must be less than 2 MB';
         }
         
         $upload_path = "image/".$filename;
         move_uploaded_file($file_tmp, $upload_path);
         
     
         //Image cover
         $filename2 = $_FILES['imagecover']['name'];
         $file_tmp2 = $_FILES['imagecover']['tmp_name'];
         $file_type2 = $_FILES['imagecover']['type'];
         $file_size2 = $_FILES['imagecover']['size'];
         
         
         if($file_size > 2097152) {
             echo 'File size must be less than 2 MB';
         }
         
         $upload_path2 = "image/".$filename2;
         move_uploaded_file($file_tmp2, $upload_path2);
    
             
            
      
        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result2 = mysqli_query($conn, $sql);
       
        $user_data = 'uname='. $username. '&name='. $name;
        if (mysqli_num_rows($result2) > 0){
            echo "Username already exists
            <p class='link'>Click here to proceed <a href='Login.php'>Login</a></p>
            ";

            exit();
        } else {
            $query    = "INSERT into `users` (name, username,  password, phoneno, email, create_datetime, filename, pagedesc, pagecover, brand)
                     VALUES ('$name', '$username', '" . md5($password) . "','$phone',  '$email', '$create_datetime', '$filename', '$desc', '$filename2', '$brand')";
         $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to proceed <a href='login.php'>Proceed</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    }
    } else {
?>


        <form action="" method="post" enctype="multipart/form-data">
        <div class="Personal-Info">
    <div class="reg">
        
        <input type="text" id="FullName" name="fname" placeholder="Full Name"><br>

        <input type="text" id="UserName" name="uname" placeholder="Username"><br>

        <input type="text" id="phone" name="phone" placeholder="Phone No."><br>

        <input type="text" id="email" name="email" placeholder="Email"><br>

        <input type="password" id="pass" name="password" placeholder="Create Password"><br> 
        
        <input type="password" id="pass" name="re-password" placeholder="Re type Password"><br>
</div>

<div class="reg">
        <input type="text" id="brand" name="brand" placeholder="Business Name"><br>
        
        <input type="text" id="desc" name="desc" placeholder="Business Description"><br>
        <p class="note">*This is will appear on your page*</p>

        <label>Upload brand logo</label><input type="file" name="image" value=""/><br>

        <label>Upload cover image</label><input type="file" name="imagecover" value=""/><br>

        <input type="text" id="doc" name="doc" placeholder="Documentation "><br>

        <input type="text" id="phone" name="business" placeholder="Type Of Business"><br>
        
</div>
</div>
<center><button type="submit">Submit</button></a></center>
</form>

<?php
    }
?>
</div><h5>Already have an account?</h5><br>
<a href="login.php">Login</a><br>
</div>
  <!--****FOOTER****-->
  <?php
include "footer.php";
 ?>
</body></html>