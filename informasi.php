<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informasi - Lapas Parepare</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
body {
    font-family: "Poppins", sans-serif;
    background: #f5f6fa;
}

/* TOP BAR */
.top-bar {
    background: #030a3a;
    color: white;
    height: auto;
    font-size: 14px;
    padding: 5px 0;
}
.top-bar i {
    font-size: 18px;
    cursor: pointer;
    transition: 0.3s;
}
.top-bar i:hover {
    color: #b99309;
}

/* MENU BAR */
.menu-bar {
    background: white;
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}
.menu-item {
    transition: 0.3s;
}
.menu-item:hover {
    color: #b99309 !important;
    cursor: pointer;
}

/* SECTION TITLE */
.section-title {
    font-weight: 700;
    font-size: 26px;
    color: #030a3a;
    border-left: 6px solid #b99309;
    padding-left: 12px;
    margin-bottom: 25px;
    text-shadow: 0px 0px 3px rgba(185,147,9,0.4);
}

/* CARD INFO */
.info-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    border: 1px solid #ddd;
    transition: 0.35s;
}
.info-card:hover {
    box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    transform: translateY(-4px);
}

/* ICON pada kartu */
.info-icon {
    font-size: 42px;
    color: #b99309;
    text-shadow: 0px 0px 4px rgba(185,147,9,0.4);
}

</style>
</head>

<body>

<!-- ================= TOP BAR ================= -->
<div class="top-bar d-flex justify-content-between align-items-center px-4">
    <div class="left-icons d-flex align-items-center gap-3">
        <i class="bi bi-facebook"></i>
        <i class="bi bi-twitter"></i>
        <i class="bi bi-youtube"></i>
        <i class="bi bi-instagram"></i>
    </div>
</div>

<!-- ================= MENU BAR ================= -->
<div class="menu-bar">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- LOGO -->
        <div class="d-flex align-items-center gap-3">
            <img src="logo.png" width="60">
            <div>
                <div class="fw-bold text-dark" style="font-size:18px;">
                    LEMBAGA PEMASYARAKATAN KELAS IIA PAREPARE
                </div>
                <div class="text-secondary" style="margin-top:-4px; font-size:14px;">
                    KEMENTERIAN IMIGRASI DAN PEMASYARAKATAN RI
                </div>
            </div>
        </div>

        <!-- MENU -->
        <div class="nav-menu d-flex gap-4">
            <a href="profil.php" class="menu-item text-decoration-none text-dark fw-semibold">Profil</a>
            <a href="informasi.php" class="menu-item text-decoration-none fw-semibold" style="color:#b8860b;">
                Informasi
            </a>
            <a href="polapas.php" class="menu-item text-decoration-none text-dark fw-semibold">Pelayanan</a>
            <a href="kontak.php" class="menu-item text-decoration-none text-dark fw-semibold">Kontak</a>
        </div>

    </div>
</div>

<!-- ================= HALAMAN INFORMASI ================= -->
<div class="container mt-4 mb-5">

    <div class="section-title">Informasi Lapas Kelas IIA Parepare</div>

    <div class="row g-4">

        <!-- JAM BESUK -->
        <div class="col-md-4">
            <div class="info-card shadow-sm">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-calendar-week info-icon"></i>
                    <h5 class="fw-bold mb-0">Jadwal Kunjungan</h5>
                </div>
                <p class="mt-3 text-secondary">
                    - Senin – Kamis : 09.00 – 15.00<br>
                    - Sabtu : 09.00 - 15.00<br>
                    - Jum'at & Minggu : Libur
                </p>
            </div>
        </div>

        <!-- SYARAT KUNJUNGAN -->
        <div class="col-md-4">
            <div class="info-card shadow-sm">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-file-earmark-text info-icon"></i>
                    <h5 class="fw-bold mb-0">Syarat Kunjungan</h5>
                </div>
                <ul class="mt-3 text-secondary">
                    <li>Memiliki identitas asli (KTP/SIM).</li>
                    <li>Wajib terdaftar di sistem kunjungan.</li>
                    <li>Mematuhi peraturan keamanan.</li>
                </ul>
            </div>
        </div>

        <!-- BARANG TITIPAN -->
        <div class="col-md-4">
            <div class="info-card shadow-sm">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-box-seam info-icon"></i>
                    <h5 class="fw-bold mb-0">Barang Titipan</h5>
                </div>
                <p class="mt-3 text-secondary">
                    Barang yang dapat dititipkan: pakaian, makanan kering, perlengkapan kebersihan, dan obat khusus disertai resep dokter.
                </p>
            </div>
        </div>

        <!-- PERATURAN PENGUNJUNG -->
        <div class="col-md-6">
            <div class="info-card shadow-sm">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-exclamation-triangle info-icon"></i>
                    <h5 class="fw-bold mb-0">Peraturan Pengunjung</h5>
                </div>
                <ul class="mt-3 text-secondary">
                    <li>Dilarang membawa barang terlarang (HP, senjata, narkoba).</li>
                    <li>Dilarang memfoto atau merekam tanpa izin.</li>
                    <li>Wajib mengikuti arahan petugas.</li>
                </ul>
            </div>
        </div>

        <!-- MAKSUD & TUJUAN -->
        <div class="col-md-6">
            <div class="info-card shadow-sm">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-info-circle info-icon"></i>
                    <h5 class="fw-bold mb-0">Tujuan Pelayanan</h5>
                </div>
                <p class="mt-3 text-secondary">
                    Memberikan layanan kunjungan yang aman, tertib, dan manusiawi serta mendukung proses reintegrasi sosial Warga Binaan Pemasyarakatan.
                </p>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
