<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Daftar Kunjungan Lapas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    body {
    font-family: "Poppins", sans-serif;
    background: #f5f6fa;
}

/* ============= TOP BAR ============= */
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

/* ============= MENU BAR ============= */
.menu-bar {
    background: white;
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}
.menu-item:hover {
    color: #b8860b;
}

/* ============= CARD FORM ============= */
.custom-card {
    background: #E5E4E2;
    border: 2px solid #b8860b;
    border-radius: 18px;
    padding: 20px;
}

.logo img {
    width: 110px;
}

/* ================= RESPONSIVE MOBILE ================= */
@media(max-width: 768px) {

    /* TOP BAR MOBILE */
    .top-bar {
        flex-direction: column;
        text-align: center;
        gap: 4px;
        height: auto;
    }

    .top-bar .left-icons {
        gap: 12px;
    }

    /* MENU WRAP */
    .nav-menu {
        display: flex;
        flex-wrap: wrap;
        gap: 10px !important;
        justify-content: center;
        margin-top: 10px;
    }

    .menu-item {
        font-size: 14px;
    }

    /* CARD MENYESUAIKAN LAYAR */
    .custom-card {
        padding: 15px;
        border-radius: 14px;
    }

    /* LOGO MENGECIL */
    .logo img {
        width: 80px;
    }

    h3 {
        font-size: 20px;
    }

    /* FORM INPUT */
    .form-label {
        font-size: 14px;
        margin-bottom: 4px;
    }

    input, select {
        font-size: 14px !important;
        padding: 8px !important;
    }

    .row.g-3 > div {
        margin-bottom: 10px;
    }
}

/* HP SANGAT KECIL */
@media(max-width: 480px) {
    h3 {
        font-size: 18px;
    }
    .menu-item {
        font-size: 13px;
    }
    .logo img {
        width: 70px;
    }
}

</style>


<script>
function toggleUpload() {
    const status = document.getElementById("jenisWBP").value;
    const uploadBox = document.getElementById("uploadSurat");
    const namaWBP = document.getElementById("namaWBPbox");

    if (status === "tahanan") {
        uploadBox.classList.remove("d-none");
        namaWBP.classList.remove("d-none");
    } else if (status === "narapidana") {
        uploadBox.classList.add("d-none");
        namaWBP.classList.remove("d-none");
    } else {
        uploadBox.classList.add("d-none");
        namaWBP.classList.add("d-none");
    }

    document.getElementById("tanggal").value = "";
}

function validateDate() {
    const status = document.getElementById("jenisWBP").value;
    const input = document.getElementById("tanggal");
    let selectedDate = new Date(input.value);
    let day = selectedDate.getDay(); // 0=minggu,1=senin...

    if (status === "narapidana") {
        if (![1,3,6].includes(day)) { // senin, rabu, sabtu
            alert("Narapidana hanya bisa memilih hari Senin, Rabu, atau Sabtu.");
            input.value = "";
        }
    }
    if (status === "tahanan") {
        if (![2,4].includes(day)) { // selasa, kamis
            alert("Tahanan hanya bisa memilih hari Selasa atau Kamis.");
            input.value = "";
        }
    }
}
</script>

</head>
<body>

<!-- ===================== TOP BAR ===================== -->
<div class="top-bar d-flex justify-content-between align-items-center px-4">
    <div class="left-icons d-flex align-items-center gap-3">
        <i class="bi bi-facebook"></i>
        <i class="bi bi-twitter"></i>
        <i class="bi bi-youtube"></i>
        <i class="bi bi-instagram"></i>
    </div>

    <!-- <div class="right-info d-flex align-items-center gap-4">
        <div class="jam-op"><i class="bi bi-clock-history"></i> Senin–Jumat 08:00 - 16:30</div>
    </div> -->
</div>

<!-- ===================== MENU BAR ===================== -->
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
                    KEMENTERIAN IMIGRASI DAN PERMASYARAKATAN REPUBLIK INDONESIA
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

<!-- ===================== FORM KUNJUNGAN ===================== -->
<div class="container mt-4 mb-5">
<div class="mx-auto p-4 custom-card shadow" style="max-width: 750px;">

    <div class="logo text-center mb-3">
        <img src="logo.png" alt="Logo Lapas">
    </div>

    <h3 class="text-center mb-4 fw-bold text-dark">Formulir Kunjungan Lapas</h3>

    <form action="simpan_kunjungan.php" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Nama Pengunjung</label>
            <input type="text" class="form-control" name="nama_pengunjung" required>
        </div>

        <div class="mb-3">
        <label class="form-label">Jenis Hubungan</label>
        <select class="form-select" name="jenis_hubungan" required>
            <option value="">-- Pilih --</option>
            <option value="Anak">Anak</option>
            <option value="Istri">Istri</option>
            <option value="Suami">Suami</option>
            <option value="Ibu">Ibu</option>
            <option value="Ayah">Ayah</option>
            <option value="Kerabat Jauh">Kerabat Jauh</option>
        </select>
    </div>


        <div class="mb-3">
            <label class="form-label">NIK</label>
            <input type="text" class="form-control" name="nik" required maxlength="16" pattern="[0-9]{16}">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat Sesuai KTP</label>
            <input type="text" class="form-control" name="alamat" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor HP</label>
            <input type="text" class="form-control" name="no_hp" required>
        </div>

        <!-- JUMLAH PENGIKUT -->
        <label class="form-label mt-3">Jumlah Pengunjung yang Mengikuti</label>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Anak Laki-laki</label>
                <input type="number" class="form-control" name="anak_laki" min="0" value="0">
            </div>
            <div class="col-md-6">
                <label class="form-label">Anak Perempuan</label>
                <input type="number" class="form-control" name="anak_perempuan" min="0" value="0">
            </div>
            <div class="col-md-6">
                <label class="form-label">Dewasa Laki-laki</label>
                <input type="number" class="form-control" name="dewasa_laki" min="0" value="0">
            </div>
            <div class="col-md-6">
                <label class="form-label">Dewasa Perempuan</label>
                <input type="number" class="form-control" name="dewasa_perempuan" min="0" value="0">
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Status WBP</label>
            <select id="jenisWBP" class="form-select" name="status_wbp" onchange="toggleUpload()" required>
                <option value="">-- Pilih Status --</option>
                <option value="narapidana">Narapidana</option>
                <option value="tahanan">Tahanan (Wajib Upload Surat)</option>
            </select>
        </div>

        <div id="namaWBPbox" class="mb-3 d-none">
            <label class="form-label">Nama WBP</label>
            <input type="text" class="form-control" name="nama_wbp">
        </div>

        <div id="uploadSurat" class="mb-3 d-none">
            <label class="form-label">Upload Surat Kuasa (PDF)</label>
            <input type="file" class="form-control" name="file_surat_kuasa" accept="application/pdf">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Kunjungan</label>
            <input type="date" id="tanggal" class="form-control" name="tanggal_kunjungan" onchange="validateDate()" required>
        </div>

        <button class="btn w-100 text-white fw-semibold" style="background:#8b0000;">
            Daftar Kunjungan
        </button>

    </form>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
