<?php
session_start();
$user = 'root';
$pass = '';
$dbname = 'cliqdatabase';

$conn = new mysqli('localhost', $user, $pass, $dbname);

if($conn === false) {
    die(" Connection Failed: ". mysqli_connect_error());
}
?>