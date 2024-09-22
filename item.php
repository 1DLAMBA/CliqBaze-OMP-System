<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="Home.css? v=<?php echo time(); ?>">
    <link rel="stylesheet" href="item.css? v=<?php echo time(); ?>">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Product
    </title>
</head>
<?php

require('config.php');
?>

<?php
$title = "Item";
include "header.php";
?>
<div class="main">

    <?php

    if (isset($_POST['item'])) {
        $id = $_POST['item'];
        $sql = "SELECT * FROM daniel_contents WHERE id = '$id'";

        $result = $conn->query($sql);

        if (mysqli_num_rows($result)) {
            echo "<div class= 'ovr'>";
            while ($row = mysqli_fetch_assoc($result)) {

                $uname = $row['username'];



                echo "<div class='in-1'>
                    <img  class='image' src ='image/" . $row['filename'] . "'>
                    
                    <div class='in-2'>
                    <h1>" . $row['productname'] . "</h1>
                    <h4>₦ " . $row['productprice'] . ".00</h4>
                    <p>" . $row['productdesc'] . "</p>

                   <center> <a href=#><button>Get</button></a><br><br>
                   <form action='brandview.php' method='POST'>
                        <button type='submit' name='profile' value='" . $row['username'] . "'>Visit seller</button>
                        </form></center>";

                $sql2 = "SELECT * FROM daniel_users WHERE username = '$uname'";
                $result2 = $conn->query($sql2);
                if (mysqli_num_rows($result2)) {
                    while ($srow = mysqli_fetch_assoc($result2)) {
                        echo "<img  class='image' style='width:50px;border-radius:50px;'src ='image/" . $srow['filename'] . "'>
                                <p style='font-size:15px;'>" . $srow['brand'] . "</p> ";
                    }
                }
                echo "</div> </div>";
            }
            echo "
        </div>";
        }
    }


    ?>
</div>
<!--****FOOTER****-->
<?php
include "footer.php";
?>
</body>

</html>