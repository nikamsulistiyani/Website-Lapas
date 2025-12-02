<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil Lembaga</title>

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
}
.jam-op {
    color: #FFD700 !important;
    font-weight: 600;
}

/* MENU BAR */
.menu-bar {
    background: white;
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}
.menu-item:hover {
    color: #b8860b;
    cursor: pointer;
}

/* SECTION PROFIL */
.section-title {
    font-weight: 700;
    font-size: 26px;
    color: #030a3a;
    border-left: 5px solid #b8860b;
    padding-left: 12px;
    margin-bottom: 20px;
}

.profile-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    border: 1px solid #ddd;
}

.profile-image img {
    width: 100%;
    border-radius: 12px;
}

/* RESPONSIVE */
@media(max-width: 768px) {
    .section-title {
        font-size: 22px;
    }
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

        <!-- LOGO + TEKS -->
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
            <a href="informasi.php" class="menu-item text-decoration-none text-dark fw-semibold">Informasi</a>
            <a href="polapas.php" class="menu-item text-decoration-none text-dark fw-semibold">Pelayanan</a>
            <a href="kontak.php" class="menu-item text-decoration-none text-dark fw-semibold">Kontak</a>
        </div>

    </div>
</div>

<!-- ================= HALAMAN PROFIL ================= -->
<div class="container mt-4 mb-5">

    <div class="section-title">Profil Lapas Kelas IIA Parepare</div>

    <div class="profile-card shadow-sm">
        <div class="row g-4">

            <!-- FOTO GEDUNG -->
            <div class="col-md-5 profile-image">
                <img src="gedung.jpg" alt="Foto Gedung Lapas">
            </div>

            <!-- DESKRIPSI -->
            <div class="col-md-7">
                <h4 class="fw-bold text-dark">Sejarah Singkat</h4>
                <p style="text-align: justify;">
                    Lembaga Pemasyarakatan Kelas IIA Parepare merupakan salah satu unit pelaksana teknis 
                    di lingkungan Kementerian Imigrasi dan Pemasyarakatan Republik Indonesia yang berfungsi 
                    sebagai tempat pembinaan, pembimbingan, dan reintegrasi sosial bagi Warga Binaan Pemasyarakatan.
                </p>

                <h5 class="fw-bold text-dark mt-3">Visi</h5>
                <p>
                    “Masyarakat Memperoleh Kepastian Hukum.”
                </p>

                <h5 class="fw-bold text-dark mt-3">Misi</h5>
                <ul>
                    <li>Mewujudkan peraturan perundang-undangan yang berkualitas;</li>
                    <li>Mewujudkan pelayanan hukum yang berkualitas;</li>
                    <li>Mewujudkan penegakan hukum yang berkualitas;</li>
                    <li>Mewujudkan penghormatan, pemenuhan, dan perlindungan Hak Asasi Manusia;</li>
                    <li>Mewujudkan layanan manajemen administrasi Kementerian Hukum dan Hak Asasi Manusia;</li>
                    <li>Mewujudkan aparatur Kementerian Hukum dan Hak Asasi Manusia yang profesional dan berintegritas.</li>
                </ul>

                <!-- <h5 class="fw-bold text-dark mt-3">Struktur Organisasi</h5>
                <p>Struktur organisasi terdiri dari:</p>
                <ul>
                    <li>Kepala Lapas</li>
                    <li>Kepala Kesatuan Pengamanan</li>
                    <li>Seksi Administrasi Keamanan & Tata Tertib</li>
                    <li>Seksi Pembinaan Narapidana & Anak Didik</li>
                    <li>Staf dan Petugas Pelaksana</li> -->
                </ul>
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
