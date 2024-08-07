<?php
// Sertakan file koneksi
require_once '../../inc/koneksi.php'; // Sesuaikan jalur relatif dengan struktur direktori

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari POST
    $nik = $_POST['nik'];
    $tanggal_pulang = $_POST['tanggal_pulang'];
    $jam_pulang = $_POST['jam_pulang'];
    $status = $_POST['status'];

    // Persiapkan pernyataan SQL untuk mencegah SQL injection
    $stmt_absensi = $koneksi->prepare("INSERT INTO tb_absensipulang (nik, tanggal_pulang, jam_pulang, status) VALUES (?, ?, ?, ?)");
    $stmt_absensi->bind_param("ssss", $nik, $tanggal_pulang, $jam_pulang, $status);

    if ($stmt_absensi->execute()) {
        // Simpan data ke tabel tb_konsumsi
        $dana_konsumsi = 15000; // Dana konsumsi default

        $stmt_konsumsi = $koneksi->prepare("INSERT INTO tb_konsumsi (nik, tanggal_pulang, dana_konsumsi, status) VALUES (?, ?, ?, ?)");
        $stmt_konsumsi->bind_param("ssis", $nik, $tanggal_pulang, $dana_konsumsi, $status);

        if ($stmt_konsumsi->execute()) {
            echo "Data absensi pulang dan konsumsi berhasil disimpan.";
        } else {
            // Log error jika penyimpanan konsumsi gagal
            error_log("Error: " . $stmt_konsumsi->error);
            echo "Data absensi pulang berhasil disimpan, tetapi gagal menyimpan data konsumsi: " . $stmt_konsumsi->error;
        }

        $stmt_konsumsi->close();
    } else {
        // Log error jika penyimpanan absensi gagal
        error_log("Error: " . $stmt_absensi->error);
        echo "Terjadi kesalahan saat menyimpan data absensi: " . $stmt_absensi->error;
    }

    $stmt_absensi->close();
}

$koneksi->close();
