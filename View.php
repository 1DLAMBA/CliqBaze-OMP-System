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
    Brand
</title>
</head>
<body >
    <!----***HEADER***--->
    <header class="header">
        <div class="container">
        <nav>
       <a href="#" class="logo"><img src="ui/LOGO2.png" alt=""></a>
        
            <ul class="nav-menu" id="navigation-menu">
                    <li> <a href="index.php" class="nav-link">Home</a></li>
                    <li> <a href="About.php" class="nav-link">About</a></li>
                    <li> <a href="Shop.php" class="nav-link">Shop</a></li>
                    <li> <a href="Bas.php" class="nav-link">Become a seller</a></li>
                    <li> <a href="Contact.php" class="nav-link">Contact</a></li>
                    
                </ul>
            
            <div class="hambuger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </div>
    </header>
<script>
    const hambuger = document.querySelector('.hambuger');
const navMenu = document.querySelector('.nav-menu');

hambuger.addEventListener("click", mobileMenu);

function mobileMenu() {
  hambuger.classList.toggle("active");
  navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll('.nav-link');
navLink.forEach((n) => n.addEventListener("click", closeMenu));

function closeMenu() {
  hambuger.classList.remove("active");
  navMenu.classList.remove("active");
}
</script>
<?php
$sql = "SELECT * FROM daniel_users WHERE username='$uname' ";

$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);

?>

<div class="filter" style="background-image: url('image/<?php echo $row["pagecover"]; ?>');">
<div class="home">

   <h1><?php echo $row['brand']; ?></h1>
   <script>
    function myfunction(){
        location.href='login.php'
    }
    </script>
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
       $sql2 = "SELECT * FROM daniel_contents WHERE username='$uname'";
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
        </div>
        </center>
            ";
            
    }
    echo "</div>";
    
    } else {
        echo "0 results";
    }
    if (isset($_POST['delete'])){
        $id = $_POST['delete'];
        $sql3 = "DELETE FROM daniel_contents WHERE id = '$id'";
    
        if($conn->query($sql3) === TRUE) {
            echo "<script>location.href = 'Brand.php'</script>"  ;         
        }
    
    }
       ?>
    </div>
    
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
     header("Location: index.php");
     exit();
}
 ?>
</div>
</body></html>