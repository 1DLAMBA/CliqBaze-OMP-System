<?php
require 'config.php';


?>
<?php 

if (isset($_SESSION['id']) or isset($_SESSION['username'])) {
   
    $uname = $_SESSION['username'];
         
    
 ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Home.css? v=<?php echo time(); ?>">
        <link rel="stylesheet" href="Brand.css? v=<?php echo time(); ?>">

        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<title>
    Your Shop
</title>
</head>
<?php

include "header.php";
?>
<body >

<?php
$sql = "SELECT * FROM users WHERE username='$uname' ";

$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);

?>

<div class="filter" style="background-image: url('image/<?php echo $row["pagecover"]; ?>');background-repeat: no-repeat;
    background-size: cover;background-attachment: fixed;">
<div class="home">

   <h1><?php echo $row['brand']; ?></h1>
   <div class= "btn1">
   <div class="dropdown">
  <button class="dropbtn">
    <div class="dot"></div><br>
    <div class="dot"></div><br>
    <div class="dot"></div>

  </button>
  <div class="dropdown-content">
    <a href="logout.php"><button name="submit2" id="Logout">Log Out</button></a>
    <a href="edit profile.php"><button id="Logout">Edit</button></a>
    
  </div>
</div>
</div>
   <div class="CusLogo">
    <center><img src="image/<?php echo $row['filename']; ?>" alt="Uploaded image"></center>
    
</div>
</div>
</div>

<div class="desc">
    <p>
    <?php echo $row['pagedesc']; ?>  
</p>
</div>
<div class="Products">
    <h1>PRODUCTS</h1><br>
    <div class="Prod">
       <?php
       $sql2 = "SELECT * FROM contents WHERE username='$uname'";
       $result2 = $conn->query($sql2);  

if (mysqli_num_rows($result2) > 0) {

   
    echo"<div class='productsec'>";
   
    while($srow =mysqli_fetch_assoc($result2)){
       
        echo "<center>
        <div class='productin'>
        <div class='prodimg'>
        <img class ='imgg' src='image/" .$srow['filename']. "'>
        </div>
        <h3>".$srow['productname']."</h3>
        <p>".$srow['productdesc']."<br><br>N".$srow['productprice']."</p>
        <form method='POST' >
    <button type='submit' name='delete' value='" . $srow['id'] . "'>Delete</button>
</form>
        </div>
        </center>
            ";
            
    }
    echo "</div>";
    
    } else {
        echo "You have not added any item";
    }
    if (isset($_POST['delete'])){
        $id = $_POST['delete'];
        $sql3 = "DELETE FROM contents WHERE id = '$id'";
    
        if($conn->query($sql3) === TRUE) {
            echo "<script>location.href = 'Brand.php'</script>"  ;         
        }
    
    }
       ?>
    </div>
    <form class="prodform" action = "productcheck.php" method="post" enctype="multipart/form-data">
    <h4>Add Products</h4>
    <input type="text" name="productname" placeholder="Product name"><br>
    <input type="text" name="price" placeholder="Product price"><br>
    <input type="text" name="pdesc" placeholder="Product description">

    <div class="form-group">
              <label>Product image</label><br><input class="form-control" type="file" name="image" value="" />
            </div>
    <button type="submit" name="upload">ADD</button>
</form>
</div>
<!--****FOOTER****-->
<div class="footer-main">
    <div class="footer-links">
        <ul>
        <li> <a href="index.html" class="nav-link">Home</a></li>
        <li> <a href="About.html" class="nav-link">About</a></li>
        <li> <a href="Shop.html" class="nav-link">Shop</a></li>
        <li> <a href="Bas.html" class="nav-link">Become a seller</a></li>
        <li> <a href="Contact.html" class="nav-link">Contact</a></li>
    </ul>
    </div>
    <div class="footer-contact">
        Tel: 08069592613<br>
        Email:Cliqbaze@gmail.com<br><br>
        <input type="text" id="enquiries" name="enquiries" placeholder="Message Us"><button>Submit</button>

    </div>
    <div class="footer-logo">
        <img src="ui/LOGO2.png" width="100px">
    </div>
    <?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>
</div>
</body></html>