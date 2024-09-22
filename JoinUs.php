<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Home.css? v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <li> <a href="index.html" class="nav-link">Home</a></li>
                    <li> <a href="About.html" class="nav-link">About</a></li>
                    <li> <a href="Shop.html" class="nav-link">Shop</a></li>
                    <li> <a href="Bas.html" class="nav-link">Become a seller</a></li>
                    <li> <a href="Contact.html" class="nav-link">Contact</a></li>
                    
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

    <!-----***HOME***----->
    <div class="Home">
        <div class="welcome">
        <h1>WELCOME TO</h1>
        <h2>CliqBaze Web</h2>
        <img src="ui/undraw_onboarding_re_6osc.png"><br>
        <a href="#"><button> Explore</button></a>
        
    </div><br>
        <div class="login">
            <div class="log">
                <div class="logimg">
                    <img src="ui/undraw_website_setup_re_d4y9 (1).png">
                </div>
                <div class="logcap">
                    <h2>Our top sellers</h2>
                </div>
            </div>
            
            
            <div class="brandivs">
                <div class="brand1">
                    <h1>Brand 1</h1>
                    <img src="ui/undraw_Image_viewer_re_7ejc (1).png">
                    <img src="ui/undraw_Image_viewer_re_7ejc (1).png">
                    <img src="ui/undraw_Image_viewer_re_7ejc (1).png"><br>
                    <button>View more</button>
                </div>
                <div class="brand2">
                    <h1>Brand 2</h1>
                    <img src="ui/undraw_Image_viewer_re_7ejc (1).png">
                    <img src="ui/undraw_Image_viewer_re_7ejc (1).png">
                    <img src="ui/undraw_Image_viewer_re_7ejc (1).png"><br>
                    <button>View more</button>
                </div>
                <div class="brand3">
                    <h1>Brand 3</h1>
                    <img src="ui/undraw_Image_viewer_re_7ejc (1).png">
                    <img src="ui/undraw_Image_viewer_re_7ejc (1).png">
                    <img src="ui/undraw_Image_viewer_re_7ejc (1).png"><br>
                    <button>View more</button>
                </div>
            </div>
        </div>
    </div>
   <center> <div class="News">
        <h1>
            LATEST NEWS
        </h1>
        <div class="newp">
            <div class="newp1">
                <img src="ui/undraw_Image_viewer_re_7ejc (1).png">
            </div>
            <div class="newp1">
                <img src="ui/undraw_Image_viewer_re_7ejc (1).png">
            </div>
            <div class="newp1">
                <img src="ui/undraw_Image_viewer_re_7ejc (1).png">
            </div>

        </div>
    </div>
</center>

</body>

</html>