<div class="card card-info">
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
                    <select class="form-control" name="id_karyawan" id="id_karyawan">
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
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Dana Konsumsi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="dana_konsumsi" name="dana_konsumsi" placeholder="Dana Konsumsi" readonly>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-warning">
            <a href="?page=data-konsumsi" title="Kembali" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('id_karyawan').addEventListener('change', function() {
        // Ubah nilai dana_konsumsi menjadi 17.000 saat pilihan karyawan dipilih
        document.getElementById('dana_konsumsi').value = '15.000';
    });
</script>


<?php


if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO tb_konsumsi (id_karyawan, tanggal, dana_konsumsi) VALUES (
        '" . $_POST['id_karyawan'] . "',
        '" . $_POST['tanggal'] . "',
        '" . $_POST['dana_konsumsi'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-konsumsi';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-konsumsi';
          }
      })</script>";
	}
}
