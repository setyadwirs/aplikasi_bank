<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_cuti WHERE id_cuti='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Tanggal Mulai</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?php echo $data_cek['tanggal_mulai']; ?>">
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Sampai</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_sampai" name="tanggal_sampai" value="<?php echo $data_cek['tanggal_sampai']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alasan Cuti</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="alasan_cuti" value="<?php echo $data_cek['alasan_cuti']; ?>">
				</div>
			</div>

			<div class="form-group row">
					<label class="col-sm-2 col-form-label">Lampiran Surat</label>
					<div class="col-sm-6">
					<img src="../foto/<?php echo $data_cek['foto']; ?>" width="150px" />
					<br>
					<br>
						<input type="file" id="foto" name="foto">
					</div>
			</div>

		</div>
		<div class="card-footer">
			
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-warning">
			<a href="?page=data-cuti" title="Kembali" class="btn btn-secondary">Kembali</a>

		</div>
	</form>
</div>

<?php


$sumber = @$_FILES['foto']['tmp_name'];
$target = 'foto/';
$nama_foto = @$_FILES['foto']['name'];
$pindah = move_uploaded_file($sumber, $target . $nama_foto);


if (isset ($_POST['Ubah'])){

    $sql_ubah = "UPDATE tb_cuti SET
            id_karyawan='".$_POST['id_karyawan']."',
            tanggal_mulai='".$_POST['tanggal_mulai']."',
            tanggal_sampai='".$_POST['tanggal_sampai']."',
            alasan_cuti='".$_POST['alasan_cuti']."',
			foto='" . $nama_foto."'
            WHERE id_cuti='".$_GET['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

	  if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-cuti';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-cuti';
            }

        })</script>";
    }
}

