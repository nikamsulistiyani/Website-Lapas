<?php
session_start();
include "connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM petugas WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

if ($user) {
    if (password_verify($password, $user['password'])) {

        $_SESSION['login'] = true;
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['role'];

        header("Location: dashboard_pengunjung.php");
        exit;
    }
}

header("Location: login.php?msg=Username atau password salah!");
exit;
?>
