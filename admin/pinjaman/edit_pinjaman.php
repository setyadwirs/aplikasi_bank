<?php
// Pastikan koneksi ke database sudah ada

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_pinjaman WHERE id_pinjaman='" . mysqli_real_escape_string($koneksi, $_GET['kode']) . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_pinjaman = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pinjaman</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-edit"></i> Ubah Data
            </h3>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <!-- Existing fields -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Nasabah</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama_nasabah" name="nama_nasabah" value="<?php echo htmlspecialchars($data_pinjaman['nama_nasabah']); ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nik</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nik" name="nik" value="<?php echo htmlspecialchars($data_pinjaman['nik']); ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data_pinjaman['email']); ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" value="<?php echo htmlspecialchars($data_pinjaman['tanggal_pengajuan']); ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah Pinjaman</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman" placeholder="Jumlah Pinjaman" value="<?php echo htmlspecialchars($data_pinjaman['jumlah_pinjaman']); ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keperluan</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="keperluan" name="keperluan" rows="3" placeholder="Keperluan"><?php echo htmlspecialchars($data_pinjaman['keperluan']); ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Survei</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="tanggal_survei" name="tanggal_survei" rows="3" value="<?php echo htmlspecialchars($data_pinjaman['tanggal_survei']); ?>"></input>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status Survei</label>
                    <div class="col-sm-6">
                        <select name="status_survei" id="status_survei" class="form-control">
                            <option value="Belum Disurvei" <?php if ($data_pinjaman['status_survei'] == 'Belum Disurvei') echo 'selected'; ?>>Belum Disurvei</option>
                            <option value="Proses Disurvei" <?php if ($data_pinjaman['status_survei'] == 'Proses Disurvei') echo 'selected'; ?>>Proses Disurvei</option>
                            <option value="Disurvei" <?php if ($data_pinjaman['status_survei'] == 'Disurvei') echo 'selected'; ?>>Telah Disurvei</option>

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status Pengajuan</label>
                    <div class="col-sm-6">
                        <select name="status_pengajuan" id="status_pengajuan" class="form-control">
                            <option value="Diajukan" <?php if ($data_pinjaman['status_pengajuan'] == 'Diajukan') echo 'selected'; ?>>Diajukan</option>
                            <option value="Disetujui" <?php if ($data_pinjaman['status_pengajuan'] == 'Disetujui') echo 'selected'; ?>>Disetujui</option>
                            <option value="Ditolak" <?php if ($data_pinjaman['status_pengajuan'] == 'Ditolak') echo 'selected'; ?>>Ditolak</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alasan</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="alasan_status" name="alasan_status" rows="3" placeholder="Alasan"><?php echo htmlspecialchars($data_pinjaman['alasan_status']); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="Ubah" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['Ubah'])) {
    $sql_ubah = "UPDATE tb_pinjaman SET
            nama_nasabah='" . mysqli_real_escape_string($koneksi, $_POST['nama_nasabah']) . "',
            nik='" . mysqli_real_escape_string($koneksi, $_POST['nik']) . "',
            email='" . mysqli_real_escape_string($koneksi, $_POST['email']) . "',
            tanggal_pengajuan='" . mysqli_real_escape_string($koneksi, $_POST['tanggal_pengajuan']) . "',
            jumlah_pinjaman='" . mysqli_real_escape_string($koneksi, $_POST['jumlah_pinjaman']) . "',
            keperluan='" . mysqli_real_escape_string($koneksi, $_POST['keperluan']) . "',
            tanggal_survei='" . mysqli_real_escape_string($koneksi, $_POST['tanggal_survei']) . "',
            status_survei='" . mysqli_real_escape_string($koneksi, $_POST['status_survei']) . "',
            status_pengajuan='" . mysqli_real_escape_string($koneksi, $_POST['status_pengajuan']) . "',
            alasan_status='" . mysqli_real_escape_string($koneksi, $_POST['alasan_status']) . "'
            WHERE id_pinjaman='" . mysqli_real_escape_string($koneksi, $_GET['kode']) . "'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pinjaman';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pinjaman';
            }
        })</script>";
    }
}
?>