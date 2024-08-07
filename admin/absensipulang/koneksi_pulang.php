<?php
// Sertakan file koneksi
require_once '../../inc/koneksi.php'; // Sesuaikan jalur relatif dengan struktur direktori

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $tanggal_pulang = $_POST['tanggal_pulang'];
    $jam_pulang = $_POST['jam_pulang'];
    $status = $_POST['status'];

    // Persiapkan pernyataan SQL untuk mencegah SQL injection
    $stmt = $koneksi->prepare("INSERT INTO tb_absensipulang (nik, tanggal_pulang, jam_pulang, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nik, $tanggal_pulang, $jam_pulang, $status);

    if ($stmt->execute()) {
        echo "Data absensi pulang berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan saat menyimpan data: " . $koneksi->error;
    }

    $stmt->close();
}

$koneksi->close();
