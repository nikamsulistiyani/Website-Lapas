<?php
include "connect.php";
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Ambil semua data WBP
$query = mysqli_query($conn, "SELECT * FROM wbp ORDER BY id_wbp DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard WBP - Lapas Parepare</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
body { margin:0; font-family:"Poppins",sans-serif; background:#eef2f7; }
/* SIDEBAR */
.sidebar { width:240px; height:100vh; position:fixed; background:#0b3d91; color:white; padding-top:20px; }
.sidebar .logo { text-align:center; margin-bottom:20px; }
.sidebar .logo img { width:80px; }
.sidebar a { display:block; padding:12px 20px; color:#dce6f5; font-weight:500; text-decoration:none; }
.sidebar a:hover { background:#0a347a; color:#fff; }
/* HEADER */
.header { margin-left:240px; padding:15px 20px; background:white; border-bottom:1px solid #ddd; font-weight:600; color:#333; display:flex; justify-content:space-between; align-items:center; }
/* CONTENT */
.content { margin-left:240px; padding:20px; }
/* CARD */
.card-custom { background:white; border-radius:10px; padding:20px; border:1px solid #ddd; }
/* TABLE */
.table thead th { background:#0b3d91; color:white; }
</style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="logo">
        <img src="logo.png" alt="Logo">
        <h6 class="fw-bold mt-2">LAPAS PAREPARE</h6>
    </div>
    <a href="dashboard_pengunjung.php"><i class="bi bi-people"></i> Data Pengunjung</a>
    <a href="data_wbp.php"><i class="bi bi-person-badge"></i> Data WBP</a>
    <a href="pengaturan.php"><i class="bi bi-gear"></i> Pengaturan</a>
</div>

<!-- HEADER -->
<div class="header">
    <span>Data WBP Terdaftar</span>
    <div>
        <a href="tambah_wbp.php" class="btn btn-primary btn-sm me-2"><i class="bi bi-plus-circle"></i> Tambah WBP</a>
        <a href="logout.php" class="btn btn-outline-danger btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="content">
<div class="card-custom shadow">
    <h4 class="fw-bold mb-3">Daftar WBP</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama WBP</th>
                    <th>NIK</th>
                    <th>Blok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; while($row=mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $row['nama_wbp'] ?></td>
                    <td><?= $row['nik'] ?></td>
                    <td><?= $row['blok'] ?></td>
                    <td class="text-center">
                        <span class="badge <?= $row['status']=='tahanan'?'bg-danger':'bg-primary' ?>">
                            <?= ucfirst($row['status']) ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="hapus_wbp.php?id=<?= $row['id_wbp'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

</body>
</html>
