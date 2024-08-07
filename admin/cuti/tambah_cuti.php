<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Karyawan</label>
                <div class="col-sm-4">
                    <select class="form-control" name="id_karyawan">
                        <option>---</option>
                        <?php
                        include "inc/koneksi.php";
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan") or die(mysqli_error($koneksi));
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?php echo $data['id_karyawan']; ?>"><?php echo $data['nama_karyawan']; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Sampai</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="tanggal_sampai" name="tanggal_sampai" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alasan Cuti</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alasan_cuti" placeholder="Alasan Cuti" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lampiran Surat</label>
                <div class="col-sm-6">
                    <input type="file" id="foto" name="foto" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status Pengajuan</label>
                <div class="col-sm-6">
                    <select class="form-control" name="status" required>
                        <option value="Diajukan">Diajukan</option>
                        <!-- Opsi lainnya sesuai kebutuhan, seperti 'Disetujui', 'Ditolak' -->
                    </select>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-warning">
            <a href="?page=data-cuti" title="Kembali" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
 

    $sumber = @$_FILES['foto']['tmp_name'];
    $target = '../foto/';
    $nama_foto = @$_FILES['foto']['name'];
    $pindah = move_uploaded_file($sumber, $target . $nama_foto);

    $sql_simpan = "INSERT INTO tb_cuti (id_karyawan, tanggal_mulai, tanggal_sampai, alasan_cuti, foto, status) VALUES (
        '" . $_POST['id_karyawan'] . "',
        '" . $_POST['tanggal_mulai'] . "',
        '" . $_POST['tanggal_sampai'] . "',
        '" . $_POST['alasan_cuti'] . "',
        '" . $nama_foto . "',
        '" . $_POST['status'] . "')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);

    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
            Swal.fire({
                title: 'Cuti Diajukan!',
                text: 'Surat cuti Anda telah diajukan.',
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
                title: 'Gagal Diajukan!',
                text: 'Surat cuti Anda gagal diajukan. Silakan coba lagi.',
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
?>
