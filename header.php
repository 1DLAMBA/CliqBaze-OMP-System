<html>


<?php
$user = 'root' ;
$pass = '';
$dbname = 'cliqdatabase' ;
$conn = new mysqli('localhost', $user, $pass, $dbname);

$sql2 = "SELECT * FROM daniel_users ORDER BY id DESC LIMIT 3";

class Database
{
    public static function db()
    {
        $link = mysqli_connect('localhost:3306','root','','blog_oop');
        return $link;
    }
}
?>

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
                   <li><button class ="profile">
<a href = "Brand.php"><img src ="UI/icons8-person-96.png"></a>
</button>
                </ul>
                
            
            <div class="hambuger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            
        </nav>
        <div class="searchh">
    <center><form action="search.php" method="post" enctype="multipart/form-data">
<div class="search"><input type="text"  name="search" placeholder="Search"/><button type="submit" name="srchbtn">Search</button></div>
        </form></center>
</div>
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