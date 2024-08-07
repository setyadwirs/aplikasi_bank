<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" placeholder="Nik" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Karyawan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Karyawan">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="ttl" name="ttl" placeholder="Tempat, Tanggal Lahir">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Telepon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Telepon">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-4">
					<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
						<option>---</option>
						<option>Laki - Laki</option>
						<option>Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="level" name="level" value="Karyawan" readonly>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-warning">
			<a href="?page=data-karyawan" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Simpan'])) {
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
	$level = 'Karyawan'; // Set default value for level

	// Proses upload foto
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_foto = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target . $nama_foto);

	// Jika foto tidak diupload atau gagal diupload, set nama_foto sebagai NULL
	if (!$pindah) {
		$nama_foto = NULL;
	}

	// Menyusun query SQL
	$sql_simpan = "INSERT INTO tb_karyawan (nik, nama_karyawan, ttl, alamat, no_hp, jenis_kelamin, agama, jabatan, username, password, level, foto) VALUES (
        '$nik',
        '$nama_karyawan',
        '$ttl',
        '$alamat',
        '$no_hp',
        '$jenis_kelamin',
        '$agama',
        '$jabatan',
        '$username',
        '$password',
        '$level',
        '$nama_foto'
    )";

	// Menjalankan query
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
            Swal.fire({
                title: 'Tambah Data Berhasil',
                text: '',
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
                title: 'Tambah Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=add-karyawan';
                }
            });
        </script>";
	}
}
?>