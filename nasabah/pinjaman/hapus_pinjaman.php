<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_pinjaman WHERE id_pinjaman='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<?php


$sql_hapus = "DELETE FROM tb_pinjaman WHERE id_pinjaman='" . $_GET['kode'] . "'";
$query_hapus = mysqli_query($koneksi, $sql_hapus);
if ($query_hapus) {
    echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pinjaman'
        ;}})</script>";
} else {
    echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-pinjaman'
        ;}})</script>";
}
