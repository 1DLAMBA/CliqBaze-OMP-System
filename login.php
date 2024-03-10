<!DOCTYPE html>
<head>
        <link rel="stylesheet" href="Home.css? v=<?php echo time(); ?>">
        <link rel="stylesheet" href="BAS.css? v=<?php echo time(); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">
<title>
    Login
</title>
</head>
<?php
$title = "HOME";
include "header.php";
?>
    
    <div class="main">
        <center><h1>SIGN IN</h1></center>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
    <div class="inner">
        
<div class="Personal-Info">
    <div class="P-reg">
    <?php
    require('config.php');
   
    // When form submitted, check and create user session.
    if (isset($_POST['uname'])) {
       
        $username = stripslashes($_REQUEST['uname']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: Brand.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form action="" method="POST">

        <input type="text"  name="uname" placeholder="Username"><br>

        <input type="password"  name="password" placeholder="Create Password"><br> 
        <center><button type="submit">Submit</button></a></center><br>    
    </form>
    <?php
    }
?>
    </div>

</div>
<a href="BAS.php" class="ca">Create an account</a>

</div><br>
</div>
  <!--****FOOTER****-->
  <?php
include "footer.php";
 ?>
</body></html>