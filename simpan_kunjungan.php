<?php
include "connect.php";

// Ambil data form
$nama_pengunjung   = $_POST['nama_pengunjung'];
$jenis_hubungan    = $_POST['jenis_hubungan'];
$nik               = $_POST['nik'];
$alamat            = $_POST['alamat'];
$no_hp             = $_POST['no_hp'];

$anak_laki         = $_POST['anak_laki'];
$anak_perempuan    = $_POST['anak_perempuan'];
$dewasa_laki       = $_POST['dewasa_laki'];
$dewasa_perempuan  = $_POST['dewasa_perempuan'];

$status_wbp        = $_POST['status_wbp']; // narapidana / tahanan
$nama_wbp          = $_POST['nama_wbp'];
$tanggal_kunjungan = $_POST['tanggal_kunjungan'];

// Hitung jumlah
$jumlah_anak   = $anak_laki + $anak_perempuan;
$jumlah_dewasa = $dewasa_laki + $dewasa_perempuan;

// --------------------------
// Validasi Hari Kunjungan
// --------------------------
$hari = date('N', strtotime($tanggal_kunjungan)); 
// 1=Senin ... 7=Minggu

if ($status_wbp == "narapidana") {
    if (!in_array($hari, [1, 3, 6])) {
        echo "<script>alert('Narapidana hanya bisa dikunjungi Senin, Rabu, dan Sabtu!');
              window.history.back();</script>";
        exit();
    }
}

// --------------------------
// Nomor Antrian Otomatis
// --------------------------
$sql_antrian = mysqli_query($conn,
    "SELECT MAX(nomor_antrian) AS nomor FROM kunjungan 
     WHERE tanggal_kunjungan='$tanggal_kunjungan'"
);

$data_antrian = mysqli_fetch_assoc($sql_antrian);
$nomor_antrian = $data_antrian['nomor'] + 1;

if ($nomor_antrian < 1) {
    $nomor_antrian = 1;
}

// --------------------------
// Upload Surat (Tahanan)
// --------------------------
$file_surat = NULL;

if ($status_wbp == "tahanan") {
    if (!empty($_FILES['file_surat_kuasa']['name'])) {
        $nama_file = time() . "_" . $_FILES['file_surat_kuasa']['name'];
        move_uploaded_file($_FILES['file_surat_kuasa']['tmp_name'], "uploads/" . $nama_file);
        $file_surat = $nama_file;
    } else {
        echo "<script>alert('Tahanan wajib upload surat kuasa!'); history.back();</script>";
        exit();
    }
}

// --------------------------
// Simpan ke Database
// --------------------------
$query = "INSERT INTO kunjungan SET
    nama_pengunjung   = '$nama_pengunjung',
    jenis_hubungan    = '$jenis_hubungan',
    nama_wbp          = '$nama_wbp',
    nik               = '$nik',
    alamat            = '$alamat',
    file_surat_kuasa  = '$file_surat',
    tanggal_kunjungan = '$tanggal_kunjungan',
    nomor_antrian     = '$nomor_antrian',
    no_hp             = '$no_hp',
    jumlah_dewasa     = '$jumlah_dewasa',
    jumlah_anak       = '$jumlah_anak',
    status_wbp        = '$status_wbp',
    created_at        = NOW()
";

if (mysqli_query($conn, $query)) {
    $last_id = mysqli_insert_id($conn);
    echo "<script>
            window.location='antrian.php?id=$last_id';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
