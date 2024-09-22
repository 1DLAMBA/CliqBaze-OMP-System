<?php
require 'config.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Home.css? v=<?php echo time(); ?>">
        <link rel="stylesheet" href="Brand.css? v=<?php echo time(); ?>">

        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<title>
    Home
</title>
</head>
<body>
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

<div id="Form-handle">
<form action="profileupdate.php" method="post" enctype="multipart/form-data">
    <input type="file" name="uploadfile" value=""/><br>
    <input type="file" name="uploadbackfile" value=""/><br>
    <input type="text" name="desc" placeholder="Page Description">
    <button type="submit" name="upload">Save</button>
</form>

</div>

</body>
</html>