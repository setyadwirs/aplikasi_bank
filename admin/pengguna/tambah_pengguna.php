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
					<input type="text" class="form-control" id="nik" name="nik" placeholder="nik" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Telepon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="level" name="level" placeholder="Level">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
				</div>
			</div>
			
			<hr>
			<h6>Input Pengguna</h6>
			<hr>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="username" placeholder="Username" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-warning">
			<a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>

<?php

$sumber = @$_FILES['foto']['tmp_name'];
$target = 'foto/';
$nama_foto = @$_FILES['foto']['name'];
$pindah = move_uploaded_file($sumber, $target . $nama_foto);


if (isset($_POST['Simpan'])) {

	// $kode = $_POST['kode_pengguna'];
	// $nik = $_POST['nik'];
	// $nama = $_POST['nama'];
	// $telepon = $_POST['telepon'];
	// $alamat = $_POST['alamat'];
	// $level = $_POST['level'];
	// $nama_foto = $_POST['foto'];
	// $username = $_POST['username'];
	// $password = $_POST['password'];
	


	$sql_simpan = "INSERT INTO tb_pengguna (nik, nama, telepon, alamat, level, foto,  username, password) VALUES (
  
        '" . $_POST['nik'] . "',
		 '" . $_POST['nama'] . "',
		 '" . $_POST['telepon'] . "',
         '" . $_POST['alamat'] . "',
		 '" . $_POST['level'] . "',
		 '" . $nama_foto . "',
		 '" . $_POST['username'] . "',
        '" . $_POST['password'] . "')";
		
	// $sqlPengguna = mysqli_query($koneksi, "INSERT INTO tb_pengguna(kode_pengguna,username,password,level) VALUES('$kode','$username','$password','$jabatan')");

	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengguna';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=tambah-pengguna';
          }
      })</script>";
	}
}
