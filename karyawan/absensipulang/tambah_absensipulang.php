<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Absensi
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
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan") or die (mysqli_error($koneksi));
                    while($data = mysqli_fetch_array($query)) {
						?>
						<option value="<?php echo $data['id_karyawan']; ?>"><?php echo $data['nama_karyawan']; ?> </option>
						<?php
                    }
                    ?>
                    </select>
                    
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jam Masuk</label>
				<div class="col-sm-6">
					<input type="time" class="form-control" id="jam_masuk" name="jam_masuk"  required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jam Keluar</label>
				<div class="col-sm-6">
					<input type="time" class="form-control" id="jam_keluar" name="jam_keluar"  required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Masuk</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"  required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Keluar</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"  required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-4">
					<select name="status" class="form-control" required>
						<option>---</option>
						<option value="Hadir">Hadir</option>
						<option value="Izin">Izin</option>
						<option value="Sakit">Sakit</option>
						
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">

			
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-warning">
			<a href="?page=data-absensi" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>

<?php

// $sumber = @$_FILES['foto_ruangan']['tmp_name'];
// $target = 'foto/';
// $nama_file = @$_FILES['foto_ruangan']['name'];
// $pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO tb_absensi (id_karyawan, jam_masuk, jam_keluar, tanggal_masuk, tanggal_keluar, status) VALUES (
    
        '" . $_POST['id_karyawan'] . "',
		'" . $_POST['jam_masuk'] . "',
		'" . $_POST['jam_keluar'] . "',
		'" . $_POST['tanggal_masuk'] . "',
		'" . $_POST['tanggal_keluar'] . "',
		'" . $_POST['status'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-absensi';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-absensi';
          }
      })</script>";
	}
}
