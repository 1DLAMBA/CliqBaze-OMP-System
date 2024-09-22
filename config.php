<?php
session_start();
$user = 'root';
$pass = '';
$dbname = 'cliqdatabaze';

$conn = new mysqli("178.62.55.165", "vivushub_user1", "a@Xqt+xxy7W-", 
"vivushub_web_user", "3306");

if($conn === false) {
    die(" Connection Failed: ". mysqli_connect_error());
}

$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phoneno VARCHAR(15),
    email VARCHAR(255),
    create_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    filename VARCHAR(255),
    pagedesc TEXT,
    pagecover VARCHAR(255),
    brand VARCHAR(255)
)";

// SQL query to create the 'contents' table
$sql_contents = "CREATE TABLE IF NOT EXISTS contents (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productname VARCHAR(255) NOT NULL,
    filename VARCHAR(255),
    productprice DECIMAL(10, 2) NOT NULL,
    username VARCHAR(255),
    productdesc TEXT,
    brand VARCHAR(255)
)";

// Execute 'users' table creation
if ($conn->query($sql_users) === TRUE) {
    echo "Table 'users' created successfully<br>";
} else {
    echo "Error creating 'users' table: " . $conn->error . "<br>";
}

// Execute 'contents' table creation
if ($conn->query($sql_contents) === TRUE) {
    echo "Table 'contents' created successfully";
} else {
    echo "Error creating 'contents' table: " . $conn->error;
}
?>