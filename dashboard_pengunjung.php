<?php
include "connect.php";
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Ambil semua data pengunjung
// Filter tanggal
if (isset($_GET['tanggal']) && $_GET['tanggal'] != "") {
    $tanggal = $_GET['tanggal'];
    $query = mysqli_query($conn, "SELECT * FROM kunjungan WHERE tanggal_kunjungan = '$tanggal' ORDER BY id_kunjungan DESC");
} else {
    $query = mysqli_query($conn, "SELECT * FROM kunjungan ORDER BY id_kunjungan DESC");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Pengunjung - Lapas Parepare</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: #eef2f7;
}

/* SIDEBAR */
.sidebar {
    width: 240px;
    height: 100vh;
    position: fixed;
    background: #0b3d91;
    color: white;
    padding-top: 20px;
}
.sidebar .logo {
    text-align: center;
    margin-bottom: 20px;
}
.sidebar .logo img {
    width: 80px;
}
.sidebar a {
    display: block;
    padding: 12px 20px;
    color: #dce6f5;
    font-weight: 500;
    text-decoration: none;
}
.sidebar a:hover {
    background: #0a347a;
    color: #fff;
}

/* HEADER */
.header {
    margin-left: 240px;
    padding: 15px 20px;
    background: white;
    border-bottom: 1px solid #ddd;
    font-weight: 600;
    color: #333;
}

/* CONTENT */
.content {
    margin-left: 240px;
    padding: 20px;
}

/* CARD */
.card-custom {
    background: white;
    border-radius: 10px;
    padding: 20px;
    border: 1px solid #ddd;
}

/* TABLE */
.table thead th {
    background: #0b3d91;
    color: white;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="logo">
        <img src="logo.png" alt="Logo">
        <h6 class="fw-bold mt-2">LAPAS PAREPARE</h6>
    </div>

    <!-- <a href="#"><i class="bi bi-speedometer2"></i> Dashboard</a> -->
    <a href="dashboard_pengunjung.php"><i class="bi bi-people"></i> Data Pengunjung</a>
    <!-- <a href="#"><i class="bi bi-calendar-week"></i> Jadwal Kunjungan</a> -->
    <a href="pengaturan.php"><i class="bi bi-people"></i> Data WBP</a>
    <a href="pengaturan.php"><i class="bi bi-gear"></i> Pengaturan</a>
</div>

<!-- HEADER -->
<div class="header d-flex justify-content-between align-items-center">
    <span>Data Pengunjung Terdaftar</span>

    <a href="logout.php" 
       class="btn btn-outline-danger btn-sm fw-semibold d-flex align-items-center"
       style="border-radius: 30px; padding: 6px 16px;">
        <i class="bi bi-box-arrow-right me-1"></i> Logout
    </a>
</div>


<!-- CONTENT -->
<div class="content">

<div class="card-custom shadow">
    <h4 class="fw-bold mb-3">Data Pengunjung</h4>

    <div class="table-responsive mt-3">
        <!-- FORM FILTER TANGGAL -->
        <form action="" method="GET" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="date" name="tanggal" class="form-control" value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : '' ?>">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100"><i class="bi bi-search"></i> Cari</button>
            </div>
            <div class="col-md-2">
                <a href="dashboard_pengunjung.php" class="btn btn-secondary w-100">
                    <i class="bi bi-arrow-clockwise"></i> Reset
                </a>
            </div>
        </form>

        <table class="table table-bordered table-striped align-middle">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>No Antrian</th>
            <th>Nama Pengunjung</th>
            <th>NIK</th>
            <th>No HP</th>
            <th>Nama WBP</th>
            <th>Status WBP</th>
            <th>Tanggal Kunjungan</th>
            <th>Surat Kuasa</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no=1; while($row=mysqli_fetch_assoc($query)): ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
            
            <!-- NOMOR ANTRIAN -->
            <td class="text-center fw-bold text-primary">
                AN<?= $row['nomor_antrian'] ?>
            </td>

            <td><?= $row['nama_pengunjung'] ?></td>
            <td><?= $row['nik'] ?></td>
            <td><?= $row['no_hp'] ?></td>
            <td><?= $row['nama_wbp'] ?></td>

            <td class="text-center">
                <span class="badge <?= $row['status_wbp']=='tahanan'?'bg-danger':'bg-primary' ?>">
                    <?= ucfirst($row['status_wbp']) ?>
                </span>
            </td>

            <td class="text-center">
                <?= date('d-m-Y', strtotime($row['tanggal_kunjungan'])) ?>
            </td>

            <td class="text-center">
                <?php if($row['file_surat_kuasa']): ?>
                    <a href="uploads/<?= $row['file_surat_kuasa'] ?>" class="btn btn-success btn-sm" download>
                        <i class="bi bi-download"></i>
                    </a>
                <?php else: ?>
                    <small class="text-muted">-</small>
                <?php endif; ?>
            </td>

            <td class="text-center">
                <a href="hapus_kunjungan.php?id=<?= $row['id_kunjungan'] ?>"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin ingin menghapus data ini?');">
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
