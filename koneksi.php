<?php

$host = "localhost"; 
$user = "root";
$pass = "";
$database ="8669";
/*
$host = "localhost"; 
$user = "root";
$pass = "";
$database ="8669";
*/
$conn = mysqli_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysqli_select_db($conn,$database) or die("Tidak ada database yang dipilih!");

?>