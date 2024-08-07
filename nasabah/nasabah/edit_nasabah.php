<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Edit Data Nasabah
		</h3>
	</div>
	<?php
	// Koneksi ke database
	include '../inc/koneksi.php';

	// Ambil data dari URL
	$id_nasabah = $_GET['kode'];
	$sql = $koneksi->query("SELECT * FROM tb_nasabah WHERE id_nasabah='$id_nasabah'");
	$data = $sql->fetch_assoc();
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Nasabah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_nasabah" name="nama_nasabah" value="<?= $data['nama_nasabah']; ?>" placeholder="Nama Nasabah">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" value="<?= $data['nik']; ?>" placeholder="NIK" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="ttl" name="ttl" value="<?= $data['ttl']; ?>" placeholder="Tempat, Tanggal Lahir">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>" placeholder="Alamat">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Telepon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $data['no_telepon']; ?>" placeholder="No Telepon">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="agama" name="agama" value="<?= $data['agama']; ?>" placeholder="Agama">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-4">
					<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
						<option value="Laki - Laki" <?= $data['jenis_kelamin'] == 'Laki - Laki' ? 'selected' : ''; ?>>Laki - Laki</option>
						<option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ibu</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $data['nama_ibu']; ?>" placeholder="Nama Ibu">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $data['pekerjaan']; ?>" placeholder="Pekerjaan">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendapatan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pendapatan" name="pendapatan" value="<?= $data['pendapatan']; ?>" placeholder="Pendapatan">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="foto" name="foto" accept="image/*">
					<img src="uploads/<?= $data['foto']; ?>" width="100" alt="Foto Nasabah">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File KTP</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_ktp" name="file_ktp" accept=".pdf,.jpg,.jpeg,.png">
					<a href="uploads/<?= $data['file_ktp']; ?>" target="_blank" class="btn btn-primary">Lihat File KTP</a>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Update" value="Update" class="btn btn-warning">
			<a href="?page=data-nasabah" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Update'])) {
	// Koneksi ke database
	include 'inc/koneksi.php';

	// Mengambil data dari form
	$nama_nasabah = $_POST['nama_nasabah'];
	$nik = $_POST['nik'];
	$ttl = $_POST['ttl'];
	$alamat = $_POST['alamat'];
	$no_telepon = $_POST['no_telepon'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$nama_ibu = $_POST['nama_ibu'];
	$pekerjaan = $_POST['pekerjaan'];
	$pendapatan = $_POST['pendapatan'];

	// Mengambil data file
	$foto = $_FILES['foto']['name'];
	$file_ktp = $_FILES['file_ktp']['name'];

	// Direktori penyimpanan file
	$target_dir = "foto/";

	// Jika ada file yang diupload
	if ($foto) {
		$target_file_foto = $target_dir . basename($_FILES["foto"]["name"]);
		move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file_foto);
		$sql_update = "UPDATE tb_nasabah SET foto='$foto' WHERE id_nasabah='$id_nasabah'";
		mysqli_query($koneksi, $sql_update);
	}

	if ($file_ktp) {
		$target_file_ktp = $target_dir . basename($_FILES["file_ktp"]["name"]);
		move_uploaded_file($_FILES["file_ktp"]["tmp_name"], $target_file_ktp);
		$sql_update = "UPDATE tb_nasabah SET file_ktp='$file_ktp' WHERE id_nasabah='$id_nasabah'";
		mysqli_query($koneksi, $sql_update);
	}

	// Query untuk mengupdate data
	$sql_update = "UPDATE tb_nasabah SET 
        nama_nasabah='$nama_nasabah', 
        nik='$nik', 
        ttl='$ttl', 
        alamat='$alamat', 
        no_telepon='$no_telepon', 
        jenis_kelamin='$jenis_kelamin', 
        agama='$agama', 
        nama_ibu='$nama_ibu', 
        pekerjaan='$pekerjaan', 
        pendapatan='$pendapatan' 
        WHERE id_nasabah='$id_nasabah'";

	$query_update = mysqli_query($koneksi, $sql_update);
	mysqli_close($koneksi);

	if ($query_update) {
		echo "<script>
        Swal.fire({title: 'Update Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = 'index.php?page=data-nasabah';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({title: 'Update Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = 'index.php?page=edit-nasabah&kode=$id_nasabah';
            }
        })</script>";
	}
}
?>