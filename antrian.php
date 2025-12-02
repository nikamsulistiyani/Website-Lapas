<?php
include "connect.php";

$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM kunjungan WHERE id_kunjungan='$id'");
$data = mysqli_fetch_assoc($sql);

// Format nomor antrian
$nomor = "AN" . $data['nomor_antrian'];

// Hitung total pengikut
$total_pengikut = $data['jumlah_anak'] + $data['jumlah_dewasa'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kartu Antrian Lapas</title>

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

.mobile-container {
    max-width: 480px;
    margin: auto;
    padding: 10px;
}
.card-antrian {
    width: 100%;
    background: #fff;
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 4px 18px rgba(0,0,0,0.08);
    font-family: 'Poppins', sans-serif;
}
.header-info { font-size: 14px; color: #333; }
.row-info { display: flex; justify-content: space-between; flex-wrap: wrap; margin-bottom: 8px; }
.row-info .label { font-weight: 600; }
.row-info .value { font-weight: 500; text-align: right; }
.divider { border: none; border-top: 1px solid #e6e6e6; margin: 15px 0; }
.nomor-title { text-align: center; font-size: 15px; font-weight: 600; margin-top: 5px; }
.nomor-antrian { text-align: center; font-size: 65px; font-weight: 700; letter-spacing: 2px; color: #0099d9; margin: 10px 0 20px; }
.info-bawah { display: flex; justify-content: space-between; margin: 20px 0; }
.info-bawah .col { width: 48%; text-align: center; }
.label-small { font-size: 13px; color: #777; }
.big-number { font-size: 26px; font-weight: bold; margin-top: 5px; }
.estimasi { text-align: center; font-size: 13px; color: #555; margin-bottom: 25px; }
.btn-batal { width: 100%; background: linear-gradient(180deg, #ff8a3f, #ff4b2e); color: #fff; border: none; padding: 15px 10px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; }
.alert-custom { font-size: 13px; border-radius: 12px; background: #fff8e5; border: 1px solid #e6c15a; color: #8a6d3b; padding: 12px 15px; }
@media (max-width: 360px) { .nomor-antrian { font-size: 50px; } .row-info { flex-direction: column; text-align: left; } }
@media (min-width: 480px) { .mobile-container { max-width: 420px; } }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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

    <div class="right-info d-flex align-items-center gap-4">
        <div class="jam-op"><i class="bi bi-clock-history"></i> Senin–Jumat 08:00 - 16:30</div>
    </div>
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
            <div class="menu-item">Profil</div>
            <div class="menu-item">Informasi</div>
            <div class="menu-item" onclick="window.location='polapas.php'">Pelayanan</div>
            <div class="menu-item">Kontak</div>
        </div>

    </div>
</div>

<div class="mobile-container">

    <!-- Kartu Antrian -->
    <div id="kartuAntrian" class="card-antrian">
        <div class="header-info">
            <div class="row-info"><span class="label">Nama Pengunjung:</span><span class="value"><?= $data['nama_pengunjung'] ?></span></div>
            <div class="row-info"><span class="label">Status WBP:</span><span class="value"><?= ucfirst($data['status_wbp']) ?></span></div>
            <div class="row-info"><span class="label">NIK:</span><span class="value"><?= $data['nik'] ?></span></div>
            <div class="row-info"><span class="label">Alamat Sesuai KTP:</span><span class="value"><?= $data['alamat'] ?></span></div>
            <div class="row-info"><span class="label">Nomor HP:</span><span class="value"><?= $data['no_hp'] ?></span></div>
            <div class="row-info"><span class="label">Nama WBP:</span><span class="value"><?= $data['nama_wbp'] ?></span></div>
            <div class="row-info"><span class="label">Tanggal Kunjungan:</span><span class="value"><?= $data['tanggal_kunjungan'] ?></span></div>
        </div>

        <hr class="divider">

        <div class="nomor-title">Nomor Antrian</div>
        <div class="nomor-antrian"><?= strtoupper("AN" . $data['nomor_antrian']) ?></div>

        <div class="info-bawah">
            <!-- <div class="col"><div class="label-small">Sisa Antrian</div><div class="big-number">96</div></div> -->
            <!-- <div class="col"><div class="label-small">Peserta Dilayani</div><div class="big-number">-</div></div> -->
        </div>

        <div class="estimasi">Estimasi Waktu Tunggu<br> -</div>

        <div class="alert alert-custom">
            <b>Catatan Penting:</b><br>
            • Jangan lupa membawa <b>identitas pengenal</b> seperti KTP atau Paspor saat kunjungan.<br>
            • Untuk pengunjung <b>Tahanan</b>, wajib membawa <b>Surat Kuasa / Bukti Surat Kunjungan</b>.
        </div>
    </div>

    <!-- Tombol Download & Batalkan -->
    <div class="mt-3">

        <!-- Unduh Kartu Antrian -->
        <button class="btn btn-outline-primary w-100 mb-2" id="downloadCard" style="border-radius:8px; font-weight:600;">
            <i class="bi bi-download"></i> Unduh Kartu Antrian
        </button>

        <!-- Unduh Bukti Surat Kunjungan -->
        <?php if(!empty($data['file_surat_kuasa'])): ?>
            <a href="uploads/<?= $data['file_surat_kuasa'] ?>" class="btn btn-success w-100 mb-2" download style="border-radius:8px; font-weight:600;">
                <i class="bi bi-file-earmark-arrow-down"></i> Unduh Bukti Surat Kunjungan
            </a>
        <?php else: ?>
            <button class="btn btn-secondary w-100 mb-2" disabled style="border-radius:8px; font-weight:600;">
                <i class="bi bi-file-earmark-arrow-down"></i> Bukti Surat Kunjungan Tidak Ada
            </button>
        <?php endif; ?>

        <!-- Tombol Batalkan -->
        <button class="btn-batal" onclick="window.location='polapas.php'">Batalkan</button>

    </div>

</div>

<script>
document.getElementById("downloadCard").addEventListener("click", function() {
    var element = document.getElementById("kartuAntrian");

    var opt = {
        margin: 10, // mm
        filename: 'kartu_antrian_<?= $data['nomor_antrian'] ?>.pdf',
        image: { type: 'jpeg', quality: 1 },
        html2canvas: { 
            scale: 2, 
            useCORS: true, 
            scrollY: 0,
            logging: true
        },
        jsPDF: { 
            unit: 'mm', 
            format: 'a4', 
            orientation: 'portrait' 
        }
    };

    html2pdf().set(opt).from(element).save();
});
</script>

</body>
</html>
