<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_absensi WHERE id_absensi='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Sifat Surat
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
						<option value="<?php echo $data['id_karyawan']; ?>" <?php echo ($data_cek['id_karyawan'] == $data['id_karyawan']) ? "selected" : "" ?>><?php echo $data['nama_karyawan']; ?></option>
						<?php
                    }
                    ?>
                    </select>
                    
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jam Masuk</label>
				<div class="col-sm-6">
					<input type="time" class="form-control" id="jam_masuk" name="jam_masuk" value="<?php echo $data_cek['jam_masuk']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jam Keluar</label>
				<div class="col-sm-6">
					<input type="time" class="form-control" id="jam_keluar" name="jam_keluar" value="<?php echo $data_cek['jam_keluar']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Masuk</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo $data_cek['tanggal_masuk']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Keluar</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="<?php echo $data_cek['tanggal_keluar']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-4">
					<select name="status" class="form-control" value="<?php echo $data_cek['status']; ?>">
						<option>Pilih Jabatan</option>
						<option value="Hadir">Hadir</option>
						<option value="Izin">Izin</option>
						<option value="Sakit">Sakit</option>
						
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
		
			
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-warning">
			<a href="?page=data-absensi" title="Kembali" class="btn btn-secondary">Kembali</a>
		</div>
	</form>
</div>

<?php


if (isset ($_POST['Ubah'])){

    $sql_ubah = "UPDATE tb_absensi SET
            id_karyawan='".$_POST['id_karyawan']."',
			jam_masuk='".$_POST['jam_masuk']."',
			jam_keluar='".$_POST['jam_keluar']."',
			tanggal_masuk='".$_POST['tanggal_masuk']."',
			tanggal_keluar='".$_POST['tanggal_keluar']."',
			status='".$_POST['status']."'
            WHERE id_absensi='".$_GET['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

		if ($query_ubah) {
			echo "<script>
      Swal.fire({title: 'Edit Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-absensi';
          }
      })</script>";
		} else {
			echo "<script>
      Swal.fire({title: 'Edit Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-absensi';
          }
      })</script>";
		}
	}
