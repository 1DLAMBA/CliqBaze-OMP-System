<?php
require 'config.php';

if (isset($_SESSION['id']) or isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Home.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="eprofile.css?v=<?php echo time(); ?>">
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Shop</title>
</head>
<?php
include "header.php";

$sql3 = "SELECT * FROM `daniel_users` WHERE username = '$uname'";
$result3 = mysqli_query($conn, $sql3);
$nrow = mysqli_fetch_assoc($result3);
echo "<h1>Welcome, ".$nrow['name']."</h1>";
?>

<body><div class="buttons">
    <button class="tapbtn" id= "profilebtn" onclick="opencity('London')">PROFILE</button>
    <button class="tapbtn" id="productbtn" onclick="opencity('Paris')">PRODUCTS</button>
</div>

<div id="London" class="w3-container city">
<form action="" method="post" enctype="multipart/form-data">

   <div class="cover" style='background-image:url("image/<?php
        if (!empty($nrow['pagecover'])) {
            echo  $nrow["pagecover"] ;
        }
        ?>");'>
        <div class="CaseCover">
            
        <div class="case">
    <label>Cover Photo</label><br>
        <input type="file" name="newcover"><br>
    </div>
    <div class="dispho">
  
  <?php
  if (!empty($nrow['filename'])) {
      echo '<img id="pphoto" src="image/' . $nrow['filename'] . '">';
  }
  ?>
  <label>Display Photo</label><br>
  <input id="pinput" type="file" name="newdispho">
  <script>
  const image = document.getElementById('pphoto'),
  input = document.getElementById('pinput');

  input.addEventListener("change", () => {
    image.src = URL.createObjectURL(input.files[0]);
  });
  </script>

</div>
    </div>
    </div> 
   
    <div class="textform">
        <div id="textform">
        <label>Full Name</label><br>
    <input type="text" id="FullName" name="fname" value="<?php echo $nrow['name']; ?>"><br>
    </div>
    <div id="textform">

    <label>Email</label><br>
    <input type="text" id="email" name="email" value="<?php echo $nrow['email']; ?>"><br>
    </div>
    <div id="textform">

    <label>Phone Number</label><br>
    <input type="text" id="phone" name="phone" value="<?php echo $nrow['phoneno']; ?>"><br>
    </div>
    <div id="textform">

    <label>Business Name</label><br>
    <input type="text" id="business" name="bname" value="<?php echo $nrow['brand']; ?>"><br>
    </div>
    <div id="textform">

    <label>Business Description</label><br>
    <input type="text" id="business2" name="bdesc" value="<?php echo $nrow['pagedesc']; ?>"><br> 
    </div>
    <button type="submit" name="proupdate"> SUBMIT </button>

    </div>

</form>
</div>

<div class="w3-container city" style="display:none" id="Paris">
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        $sql = "SELECT * FROM `daniel_contents` WHERE username = '$uname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='productin'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<center>
                    <div class='product'>
                        <div class='prodimg'>
                            <img class='imgg' src='image/" . $row['filename'] . "'>
                        </div>
                        <label>Change Product Name</label><br>
                        <input type='text' name='nproductname[" . $row['id'] . "]' value='" . $row['productname'] . "'><br>
                        <label>Change Product Description</label><br>
                        <input type='text' name='npdesc[" . $row['id'] . "]' value='" . $row['productdesc'] . "'><br><br>
                        <label>Change Product Price</label><br>
                        <input type='text' name='nprice[" . $row['id'] . "]' value='" . $row['productprice'] . "'><br>
                        <button type='submit' name='Update' value='" . $row['id'] . "'>Update</button>
                    </div>
                </center>";
            }
            echo "</div>";
        }
        ?>
    </form>
<script>
function opencity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++){
        x[i].style.display = "none";
    }
    document.getElementById(cityName).style.display = "block";
}
</script>
    <?php
    if(isset($_POST['proupdate'])) {
        $newemail = $_POST['email'];
        $newname = $_POST['fname'];
        $newphoneno = $_POST['phone'];
        $newbrand = $_POST['bname'];
        $newpagedesc = $_POST['bdesc'];

        $ogcover = $nrow['pagecover'];
        $ogdispho = $nrow['filename'];

        if (!empty($_FILES["newcover"]["name"])) {
            $filename = $_FILES['newcover']['name'];
            $file_tmp = $_FILES['newcover']['tmp_name'];
            $file_type = $_FILES['newcover']['type'];
            $file_size = $_FILES['newcover']['size'];

            if ($file_size > 2097152) {
                echo 'File size must be less than 2 MB';
            }

            $upload_path = "image/" . $filename;
            move_uploaded_file($file_tmp, $upload_path);
        } else {
            $filename = $ogcover;
        }

        if (!empty($_FILES["newdispho"]["name"])) {
            $filename2 = $_FILES['newdispho']['name'];
            $file_tmp2 = $_FILES['newdispho']['tmp_name'];
            $file_type2 = $_FILES['newdispho']['type'];
            $file_size2 = $_FILES['newdispho']['size'];

            if ($file_size2 > 2097152) {
                echo 'File size must be less than 2 MB';
            }

            $upload_path2 = "image/" . $filename2;
            move_uploaded_file($file_tmp2, $upload_path2);
        } else {
            $filename2 = $ogdispho;
        }

        $profilesql = "UPDATE daniel_users SET name = '$newname', email = '$newemail', phoneno = '$newphoneno', brand='$newbrand', pagedesc='$newpagedesc', filename='$filename2', pagecover='$filename'
                        WHERE username = '$uname'";
        $profileresult = mysqli_query($conn, $profilesql);
        if($profileresult){
        header("location:brand.php");
            ?>
            <script>
                window.alert('Updated successfully')
            </script>
            <?php

        }
    }

    if (isset($_POST['Update'])) {
        $newprodnames = $_POST['nproductname'];
        $newprices = $_POST['nprice'];
        $newdescs = $_POST['npdesc'];

        foreach ($newprodnames as $id => $newprodname) {
            $newprice = $newprices[$id];
            $newdesc = $newdescs[$id];

            $sql2 = "UPDATE daniel_contents 
                     SET productname = '$newprodname', productprice = '$newprice', productdesc = '$newdesc' 
                     WHERE id = '$id' ";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("location:brand.php");
            }
        }
    }
}
    ?>
</body>
</html>