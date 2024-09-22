<!DOCTYPE html>
<head>
        <link rel="stylesheet" href="Home.css? v=<?php echo time(); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">
<title>
    Home
</title>
</head>
<?php
$title = "HOME";
include "header.php";
?>

    <!-----***HOME***----->

    <div class="Home">
        <div class="welcome">
        <h1>WELCOME TO</h1>
        <h2>CliqBaze Web</h2>
        <div class="slideshow-container">
            <div class="mySlides fade">
              <img src="ui/cube boxes.jpg" style="width:100%">
              <div class="text">Caption Text</div>
            </div>
            
            <div class="mySlides fade">
              <img src="ui/light-grey-t-shirt.jpg" style="width:100%">
              <div class="text">Caption Two</div>
            </div>
            
            <div class="mySlides fade">
              <img src="ui/orange box.jpg" style="width:100%">
              <div class="text">Caption Three</div>
            </div>
            
            </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div>
            
            <script>
            var slideIndex = 0;
            showSlides();
            
            function showSlides() {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}    
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
              setTimeout(showSlides, 2000); 
            }
            </script><br>
        <a href="#"><button> Explore</button></a>
        
    </div><br><br>



        <div class="login">
        
            <div class="log">
                
                <div class="logcap">
                    <h2>NEW!</h2>
                    <hr>
                </div>
            </div>
            
            
            <div class="brandivs">
                <div class="brand1">
                    <?php
                    $sql2 = "SELECT * FROM users 
                            ORDER BY id 
                            DESC LIMIT 3";
  
                     $result2 = $conn->query($sql2);
                     if (mysqli_num_rows($result2)){
                        while($srow = mysqli_fetch_assoc($result2)){
                            echo "<h1>" .$srow['brand']."</h1>";
                            if(mysqli_num_rows($result2)){
                                $uname = $srow['username'];
                                $sql = "SELECT * FROM contents WHERE username ='$uname' ORDER BY id DESC LIMIT 3";
                                $result = $conn->query($sql);
                                echo "";
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<img style='width:100px' src='image/".$row['filename']."'>";
                                }
                                echo "
                                ";
                            }
                            echo "<form action='brandview.php' method='POST'>
                            <button type='submit' name='profile' value='".$srow['username']."'>View More</button>
                            </form>";
                        }
                     }
?>
                </div>
            </div>
        </div>
        
    </div>

    <!-- ****NEWS**** -->
    <div class="News">
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
            </div></div>

            <div class="newp2">
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
    </div>

    <!--****FOOTER****-->
 <?php
include "footer.php";
 ?>
</body>

</html>