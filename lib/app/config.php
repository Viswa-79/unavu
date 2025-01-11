<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$databasename = 'omtex';
$conn = mysqli_connect($hostname, $username, $password, $databasename);

if (!$conn) {
    die("Database Connection Failed" . mysqli_error($conn));
}
?>