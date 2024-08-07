<?php
include "inc/koneksi.php";

// Fungsi untuk membersihkan input
function clean_input($data)
{
    global $koneksi;
    return mysqli_real_escape_string($koneksi, trim($data));
}

if (isset($_GET['kode'])) {
    $kode = clean_input($_GET['kode']);
    $sql_cek = "SELECT * FROM tb_pinjaman WHERE id_pinjaman = ?";
    $stmt = mysqli_prepare($koneksi, $sql_cek);
    mysqli_stmt_bind_param($stmt, "s", $kode);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $data_pinjaman = mysqli_fetch_assoc($result);
    } else {
        echo "Data pinjaman tidak ditemukan.";
        exit;
    }
} else {
    echo "Parameter kode tidak ditemukan.";
    exit;
}

if (isset($_POST['Ubah'])) {
    $nama_nasabah = clean_input($_POST['nama_nasabah']);
    $nik = clean_input($_POST['nik']);
    $email = clean_input($_POST['email']);
    $tanggal_pengajuan = clean_input($_POST['tanggal_pengajuan']);
    $jumlah_pinjaman = clean_input($_POST['jumlah_pinjaman']);
    $keperluan = clean_input($_POST['keperluan']);
    $status_pengajuan = clean_input($_POST['status_pengajuan']);
    $alasan_status = clean_input($_POST['alasan_status']);

    $sql_ubah = "UPDATE tb_pinjaman SET 
        nama_nasabah=?, nik=?, email=?, tanggal_pengajuan=?, 
        jumlah_pinjaman=?, keperluan=?, status_pengajuan=?, alasan_status=? 
        WHERE id_pinjaman=?";

    $stmt = mysqli_prepare($koneksi, $sql_ubah);
    mysqli_stmt_bind_param(
        $stmt,
        "ssssdssss",
        $nama_nasabah,
        $nik,
        $email,
        $tanggal_pengajuan,
        $jumlah_pinjaman,
        $keperluan,
        $status_pengajuan,
        $alasan_status,
        $kode
    );

    $query_ubah = mysqli_stmt_execute($stmt);

    if ($query_ubah) {
        $alert_title = 'Ubah Data Berhasil';
        $alert_text = 'Data pinjaman telah diperbarui.';
        $alert_icon = 'success';
    } else {
        $alert_title = 'Ubah Data Gagal';
        $alert_text = 'Terjadi kesalahan saat memperbarui data.';
        $alert_icon = 'error';
    }
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js'></script>
    <script>
        Swal.fire({
            title: '$alert_title',
            text: '$alert_text',
            icon: '$alert_icon',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'index.php?page=data-pinjaman';
            }
        });
    </script>";
}
?>

<!-- Bagian HTML untuk formulir -->
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
</body>

</html>