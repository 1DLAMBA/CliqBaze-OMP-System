<?php
require 'config.php';


?>
<?php 

if (isset($_POST['profile'])) {
   
    $uname = $_POST['profile'];
         
    
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

<div class="filter" style="background-image: url('image/<?php echo $row["pagecover"]; ?>');">
<div class="home">

   <h1><?php echo $row['brand']; ?></h1>
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
        <form action='item.php' method='POST'>
        <button type='submit' name='item' value='" . $srow['id'] . "'>Get</button>
    </form>
        </div>
        
        </center>
            ";
            
    }
    echo "</div>";
    
    } else {
        echo "0 results";
    }
    
       ?>
    </div>
   
</div>
<?php
include "footer.php";
?>
<!--****FOOTER****-->

    <?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>
</div>

</body></html>