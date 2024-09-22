<!DOCTYPE html>
<head>
        <link rel="stylesheet" href="Home.css? v=<?php echo time(); ?>">
        <link rel="stylesheet" href="search.css? v=<?php echo time(); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">
<title>
    Home
</title>
</head>
<body>
<?php
$title = "HOME";
include "header.php";
require('config.php');

$search = $_POST['search'];
?>
<div class='ome'>
<?php
if(isset($_POST['srchbtn'])){
    $sql = "SELECT * FROM daniel_contents WHERE (`productname` LIKE '%".$search."%') ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class ='result'>";

        while($row = mysqli_fetch_assoc($result)){
            echo"
            <div class='inner-result'>
            <div class= 'inner-img'>
            <img style='width:200px;' class = 'imgg' src='image/" .$row['filename']. "'>
            </div>
            <div class = 'inner-desc'>
            <h3>".$row['productname']."</h3>
        <p>".$row['productdesc']."<br><br>N".$row['productprice']."</p>
        
        <form action='item.php' method='POST'>
        <button type='submit' name='item' value='" . $row['id'] . "'>Get</button>
    </form>
        </div>
       

            </div>
            ";
        }
        echo "</div>";
    }
   

    else{
        echo "No results Found";
    }
}
?>
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
                $sql2 = "SELECT * FROM daniel_users ORDER BY id DESC LIMIT 3";

                 $result2 = $conn->query($sql2);
                 if (mysqli_num_rows($result2)){
                    while($srow = mysqli_fetch_assoc($result2)){
                        echo "<h1>" .$srow['brand']."</h1>";
                        if(mysqli_num_rows($result2)){
                            $uname = $srow['username'];
                            $sql = "SELECT * FROM daniel_contents WHERE username ='$uname' ORDER BY id DESC LIMIT 3";
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
                <?php
include "footer.php";
 ?>
                </body>
    </html>