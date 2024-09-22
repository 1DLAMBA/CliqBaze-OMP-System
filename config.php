<?php
session_start();
$user = 'root';
$pass = '';
$dbname = 'cliqdatabaze';

$conn = new mysqli('localhost', $user, $pass, $dbname);

if($conn === false) {
    die(" Connection Failed: ". mysqli_connect_error());
}
?>