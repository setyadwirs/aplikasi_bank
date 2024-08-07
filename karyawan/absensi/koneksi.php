<?php
// Sertakan file koneksi
require_once '../../inc/koneksi.php'; // Sesuaikan jalur relatif dengan struktur direktori

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $jam_masuk = $_POST['jam_masuk'];
    $status = $_POST['status'];

    // Persiapkan pernyataan SQL untuk mencegah SQL injection
    $stmt = $koneksi->prepare("INSERT INTO tb_absensi (nik, tanggal_masuk, jam_masuk, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nik, $tanggal_masuk, $jam_masuk, $status);

    if ($stmt->execute()) {
        echo "Data absensi datang berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan saat menyimpan data: " . $koneksi->error;
    }

    $stmt->close();
}

$koneksi->close();
