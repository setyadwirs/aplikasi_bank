<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data Pinjaman
        </h3>
    </div>
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Nasabah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_nasabah" value="<?php echo $rew['nama_nasabah']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nik</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nik" value="<?php echo $rew['nik']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $rew['email']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Pinjaman</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman" placeholder="Jumlah Pinjaman" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keperluan</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="keperluan" name="keperluan" rows="3" placeholder="Keperluan"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jaminan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="jaminan" name="jaminan" placeholder="Jaminan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status Pengajuan</label>
                <div class="col-sm-6">
                    <select name="status_pengajuan" id="status_pengajuan" class="form-control">
                        <option value="Diajukan">Diajukan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-warning">
            <a href="?page=data-pinjaman" title="Kembali" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>


<?php
if (isset($_POST['Simpan'])) {
    // Koneksi ke database
   
    // Mengambil data dari form
    $nama_nasabah = $_POST['nama_nasabah'];
    $nik = $_POST['nik'];
    $email = $_POST['email'];
    $tanggal_pengajuan = $_POST['tanggal_pengajuan'];
    $jumlah_pinjaman = $_POST['jumlah_pinjaman'];
    $keperluan = $_POST['keperluan'];
    $jaminan = $_POST['jaminan'];
    $tanggal_survei = '';
    $status_survei = '';
   
    $status_pengajuan = $_POST['status_pengajuan'];

    // Jika alasan_status tidak ada di form, maka tetapkan sebagai kosong
    $alasan_status = isset($_POST['alasan_status']) ? $_POST['alasan_status'] : '';

    // Query untuk menyimpan data pinjaman
    $sql_simpan = "INSERT INTO tb_pinjaman (nama_nasabah, nik, email, tanggal_pengajuan, jumlah_pinjaman, jaminan, keperluan, tanggal_survei,status_survei, status_pengajuan, alasan_status) 
                    VALUES ('$nama_nasabah', '$nik', '$email', '$tanggal_pengajuan', '$jumlah_pinjaman', '$jaminan', '$keperluan', '$tanggal_survei', '$status_survei', '$status_pengajuan', '$alasan_status')";

    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
            Swal.fire({
                title: 'Tambah Data Pinjaman Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-pinjaman';
                }
            });
            </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Tambah Data Pinjaman Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=tambah-pinjaman';
                }
            });
            </script>";
    }
}
?>