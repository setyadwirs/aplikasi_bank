<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card card-primary">
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
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>">
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Telepon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $data_cek['telepon']; ?>">
				</div>
			</div>    
			
			
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>">
				</div>
			</div>     

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="level" name="level" value="<?php echo $data_cek['level']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-6">
					
					<img src="./foto2/<?php echo $data_cek['foto']; ?>" width="150px" />
					<br>
					<br>
					<input type="file" id="foto" name="foto">
					
				</div>
			</div>

			
			<hr>
			<h6>Input Pengguna</h6>
			<hr>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="username" value="<?php echo $data_cek['username']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" name="password" value="<?php echo $data_cek['password']; ?>">
				</div>
			</div>


		</div>
		<div class="card-footer">
			
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-warning">
			<a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Kembali</a>

		</div>
	</form>
</div>

<?php

$sumber = @$_FILES['foto2']['tmp_name'];
$target = 'foto/';
$nama_foto = @$_FILES['foto2']['name'];
$pindah = move_uploaded_file($sumber, $target . $nama_foto);


if (isset ($_POST['Ubah'])){

    $sql_ubah = "UPDATE tb_pengguna SET
            nik='".$_POST['nik']."',
            nama='".$_POST['nama']."',
            telepon='".$_POST['telepon']."',
            alamat='".$_POST['alamat']."',
			level='".$_POST['level']."',
			foto='" . $nama_foto."',
			username='".$_POST['username']."',
            password='".$_POST['password']."'
            WHERE id_pengguna='".$_GET['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

	  if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pengguna';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pengguna';
            }

        })</script>";
    }
}

