<?php
$host = "localhost";     
$user = "root";          
$pass = "";              
$db   = "lapas_pare";

$conn = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// echo "Koneksi berhasil!";
?>