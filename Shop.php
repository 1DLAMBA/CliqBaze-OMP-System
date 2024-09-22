<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="Home.css? v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Shop.css? v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop</title>
</head>
<?php
require('config.php');
?>

<?php
$title = "Shop";
include "header.php";
?><div class="SH">
<div class="main">
    <?php
    $limit = 6; // Number of records per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number, default is 1

    // Calculate the offset for the query
    $offset = ($page - 1) * $limit;

    // Retrieve the total number of records
    $totalRecords = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contents"));

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $limit);

    // Fetch the records for the current page
    $sql1 = "SELECT * FROM contents ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $result1 = $conn->query($sql1);

    if (mysqli_num_rows($result1)) {
        echo "<center><div class='row1'>";

        while ($row = mysqli_fetch_assoc($result1)) {
            echo "<div class='hold'>
                    <div class='holdimg'><center>
                    <img class='imgg' src='image/" . $row['filename'] . "'>
                    </center></div>
                    <h4 class='pn'>" . $row['productname'] . "</h4>
                    <p>₦" . $row['productprice'] . "</p>
                    <form action='item.php' method='POST'>
                        <button type='submit' name='item' value='" . $row['id'] . "'>Get</button>
                    </form>
                </div>";
        }
        echo "</div></center>";

        // Display pagination links
        echo "<center><div class='pagination'>";
        if ($page > 1) {
            echo "<a href='Shop.php?page=" . ($page - 1) . "'><button class='btn'>&laquo; Previous</button></a>";
        }

        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='Shop.php?page=" . $i . "'>" . $i . "</a>";
        }

        if ($page < $totalPages) {
            echo "<a href='Shop.php?page=" . ($page + 1) . "'><button class='btn'>Next &raquo;</button></a>";
        }
        echo "</div></center>";
    }
    ?>
</div>
</div>
<!--****FOOTER****-->
<?php
include "footer.php";
 ?>
</body>
</html>
