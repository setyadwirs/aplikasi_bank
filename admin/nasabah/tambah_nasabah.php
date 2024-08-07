<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<!-- Existing form fields -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Nasabah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_nasabah" name="nama_nasabah" placeholder="Nama Nasabah">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" placeholder="Nik" required>
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
					<input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
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
				<label class="col-sm-2 col-form-label">Nama Ibu</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendapatan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pendapatan" name="pendapatan" placeholder="Pendapatan">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="email" name="email">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File KTP</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_ktp" name="file_ktp" accept=".pdf,.jpg,.jpeg,.png" required>
				</div>
			</div>

			<!-- New fields for username, password, and level -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="level" name="level" value="Nasabah" readonly>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-warning">
			<a href="?page=data-nasabah" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Simpan'])) {
	// Koneksi ke database
	include 'inc/koneksi.php';

	// Mengambil data dari form
	$nik = $_POST['nik'];
	$nama_nasabah = $_POST['nama_nasabah'];
	$ttl = $_POST['ttl'];
	$alamat = $_POST['alamat'];
	$no_telepon = $_POST['no_telepon'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$nama_ibu = $_POST['nama_ibu'];
	$pekerjaan = $_POST['pekerjaan'];
	$pendapatan = $_POST['pendapatan'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password']; // Enkripsi password
	$level = 'Nasabah'; // Set level secara otomatis

	// Mengambil data file
	$foto = $_FILES['foto']['name'];
	$file_ktp = $_FILES['file_ktp']['name'];

	// Direktori penyimpanan file
	$target_dir = "foto/";
	$target_file_foto = $target_dir . basename($_FILES["foto"]["name"]);
	$target_file_ktp = $target_dir . basename($_FILES["file_ktp"]["name"]);

	// Upload file
	if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file_foto) && move_uploaded_file($_FILES["file_ktp"]["tmp_name"], $target_file_ktp)) {
		// Query untuk menyimpan data
		$sql_simpan = "INSERT INTO tb_nasabah (nik, nama_nasabah, ttl, alamat, no_telepon, jenis_kelamin, agama, nama_ibu, pekerjaan, pendapatan, email, foto, file_ktp, username, password, level) VALUES (
            '$nik',
            '$nama_nasabah',
            '$ttl',
            '$alamat',
            '$no_telepon',
            '$jenis_kelamin',
            '$agama',
            '$nama_ibu',
            '$pekerjaan',
            '$pendapatan',
			'$email',
            '$foto',
            '$file_ktp',
            '$username',
            '$password',
            '$level'
        )";

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
                        window.location = 'index.php?page=data-nasabah';
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
                        window.location = 'index.php?page=add-nasabah';
                    }
                });
            </script>";
		}
	} else {
		echo "<script>
            Swal.fire({
                title: 'Upload File Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=add-nasabah';
                }
            });
        </script>";
	}
}
?>