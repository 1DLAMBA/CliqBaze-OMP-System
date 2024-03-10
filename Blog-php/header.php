<?php
require_once 'vendor/autoload.php';
use App\classes\Post;
use App\classes\Site;
$ob = Site::display();
$siteData = mysqli_fetch_assoc($ob);
#$post = Post::showActivelPost();
$populer = Post::showPopulerlPost();
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
$title = '';
if($page == 'login.php'){
    $title = 'Home';
}
elseif ($page == 'contact.php'){
    $title = 'Contact';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Home.css? v=<?php echo time(); ?>">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title><?= $title . ' | ' . $siteData['title']?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="assets/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="assets/css/colors.css" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="assets/css/version/tech.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">
    <header class="header">
        <div class="container">
        <nav>
       <a href="#" class="logo"><img src="LOGO2.png" alt=""></a>
        
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
     
                            <?php
            $ob = new \App\classes\Site();
            $a = $ob->display();
            $siteData = mysqli_fetch_assoc($a);
            $skip = 0;
            $take = $siteData['postdisplay'];
            $page = 1;
         
            $sql = "SELECT blog.*, categories.category_name FROM blog INNER JOIN categories ON blog.cat_id = categories.id ORDER BY id DESC LIMIT $skip,$take ";
            $post = \App\classes\Post::pagination($sql);
            while ($row = mysqli_fetch_assoc($post)){
            }?>

</div>  
                            <form class="form-inline" method="get">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search  "
                                    aria-label="Search" name="search" style="width:210px;height:30px;">
                                <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Search"
                                    style="cursor: pointer;" name="search-btn" >
                            </form>
                        
                    
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

        <hr>
        <section class="section">
            <div class="container">
                <div class="row">