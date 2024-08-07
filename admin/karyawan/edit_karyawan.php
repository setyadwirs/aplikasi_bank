<?php
// Pastikan koneksi database sudah ada dan diatur pada variabel $koneksi

if (isset($_GET['kode'])) {
	// Ambil data berdasarkan id_karyawan
	$sql_cek = "SELECT * FROM tb_karyawan WHERE id_karyawan = '" . mysqli_real_escape_string($koneksi, $_GET['kode']) . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_ASSOC);
}
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Edit Data Karyawan
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<!-- Form Fields -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo htmlspecialchars($data_cek['nik']); ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Karyawan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?php echo htmlspecialchars($data_cek['nama_karyawan']); ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="ttl" name="ttl" value="<?php echo htmlspecialchars($data_cek['ttl']); ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo htmlspecialchars($data_cek['alamat']); ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Telepon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo htmlspecialchars($data_cek['no_hp']); ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-4">
					<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
						<option value="" <?php echo ($data_cek['jenis_kelamin'] == '') ? 'selected' : ''; ?>>---</option>
						<option value="Laki - Laki" <?php echo ($data_cek['jenis_kelamin'] == 'Laki - Laki') ? 'selected' : ''; ?>>Laki - Laki</option>
						<option value="Perempuan" <?php echo ($data_cek['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="agama" name="agama" value="<?php echo htmlspecialchars($data_cek['agama']); ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo htmlspecialchars($data_cek['jabatan']); ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($data_cek['username']); ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="password" name="password" placeholder="Biarkan kosong jika tidak diubah">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="foto" name="foto">
					<?php if (!empty($data_cek['foto'])) : ?>
						<img src="foto/<?php echo htmlspecialchars($data_cek['foto']); ?>" alt="Foto Karyawan" style="width: 100px; height: auto;">
					<?php endif; ?>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-warning">
			<a href="?page=data-karyawan" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Ubah'])) {
	// Sanitasi input
	$nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
	$nama_karyawan = mysqli_real_escape_string($koneksi, $_POST['nama_karyawan']);
	$ttl = mysqli_real_escape_string($koneksi, $_POST['ttl']);
	$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
	$no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
	$jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
	$agama = mysqli_real_escape_string($koneksi, $_POST['agama']);
	$jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);
	$id_karyawan = mysqli_real_escape_string($koneksi, $_GET['kode']);

	// Tangani upload foto
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_foto = @$_FILES['foto']['name'];

	if (!empty($nama_foto)) {
		$pindah = move_uploaded_file($sumber, $target . $nama_foto);
		if ($pindah) {
			$sql_ubah = "UPDATE tb_karyawan SET
                nik='$nik',
                nama_karyawan='$nama_karyawan',
                ttl='$ttl',
                alamat='$alamat',
                no_hp='$no_hp',
                jenis_kelamin='$jenis_kelamin',
                agama='$agama',
                jabatan='$jabatan',
                username='$username',
                password='" . (!empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $data_cek['password']) . "',
                foto='$nama_foto'
                WHERE id_karyawan='$id_karyawan'";
		} else {
			// Jika gagal upload, jangan perbarui foto
			$sql_ubah = "UPDATE tb_karyawan SET
                nik='$nik',
                nama_karyawan='$nama_karyawan',
                ttl='$ttl',
                alamat='$alamat',
                no_hp='$no_hp',
                jenis_kelamin='$jenis_kelamin',
                agama='$agama',
                jabatan='$jabatan',
                username='$username',
                password='" . (!empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $data_cek['password']) . "'
                WHERE id_karyawan='$id_karyawan'";
		}
	} else {
		// Jika tidak ada file baru, hanya update data lain
		$sql_ubah = "UPDATE tb_karyawan SET
            nik='$nik',
                       nama_karyawan='$nama_karyawan',
            ttl='$ttl',
            alamat='$alamat',
            no_hp='$no_hp',
            jenis_kelamin='$jenis_kelamin',
            agama='$agama',
            jabatan='$jabatan',
            username='$username',
            password='" . (!empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $data_cek['password']) . "'
            WHERE id_karyawan='$id_karyawan'";
	}

	$query_ubah = mysqli_query($koneksi, $sql_ubah);

	if ($query_ubah) {
		echo "<script>
        Swal.fire({
            title: 'Ubah Data Berhasil',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-karyawan';
            }
        });
        </script>";
	} else {
		echo "<script>
        Swal.fire({
            title: 'Ubah Data Gagal',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-karyawan';
            }
        });
        </script>";
	}
}
?>