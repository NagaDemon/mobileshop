<?php
$conn = mysqli_connect("localhost", "root", "", "mobileshop");
$dbSetLang = mysqli_query($conn, "SET NAMES utf8");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>