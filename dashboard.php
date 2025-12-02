<?php
session_start();
include "connect.php";
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Lapas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

<h3>Selamat datang, <?= $_SESSION['nama'] ?> 👋</h3>
<p>Anda login sebagai <b><?= $_SESSION['role'] ?></b></p>

<a href="form_kunjungan.php" class="btn btn-primary mt-3">Masuk ke Form Kunjungan</a>
<a href="logout.php" class="btn btn-danger mt-3">Logout</a>

</body>
</html>
