<?php
include "inc/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $idCuti = $_POST['id_cuti'];
    $alasan = mysqli_real_escape_string($koneksi, $_POST['alasan_status']);

    // Update status pengajuan menjadi 'Ditolak' dengan alasan
    $sqlTolak = "UPDATE tb_cuti SET status = 'Disetujui', alasan_status = '$alasan' WHERE id_cuti = '$idCuti'";
    $queryTolak = mysqli_query($koneksi, $sqlTolak);

    if ($queryTolak) {
        echo "<script>
            Swal.fire({
                title: 'Cuti Disetujui!',
                text: 'Surat cuti Anda telah disetujui.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-cuti';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat memperbarui status cuti. Silakan coba lagi.',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-cuti';
                }
            });
        </script>";
    }
}
