<?php
include "connect.php";
session_start();

// Cek login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

// Ambil data untuk cek file surat kuasa
$q = mysqli_query($conn, "SELECT file_surat_kuasa FROM kunjungan WHERE id_kunjungan='$id'");
$data = mysqli_fetch_assoc($q);

// Hapus file surat kuasa jika ada
if (!empty($data['file_surat_kuasa'])) {
    $file_path = "uploads/" . $data['file_surat_kuasa'];
    if (file_exists($file_path)) {
        unlink($file_path); // hapus file fisik
    }
}

// Hapus data dari database
mysqli_query($conn, "DELETE FROM kunjungan WHERE id_kunjungan='$id'");

// Kembali ke dashboard
header("Location: dashboard_pengunjung.php");
exit;
?>
