<div class="card">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Data Karyawan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">

		<form action="admin/karyawan/cetak_filter.php" method="GET">
			<div class="row">
				<div class="col-2">
					<select name="pencarian" id="pencarian" class="form-control">
						<option value="">---</option>
						<?php
						$query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan") or die(mysqli_error($koneksi));
						while ($data = mysqli_fetch_array($query)) {
						?>
							<option value="<?php echo $data['id_karyawan']; ?>"><?php echo $data['jabatan']; ?> </option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="col">
					<button type="submit" class="btn btn-info" name="cetak_per_karyawan">
						<i class="fa fa-print"></i> Cetak PerJabatan
					</button>
				</div>
			</div>
		</form>	

		<?php
		if (isset($_GET['cetak_per_karyawan'])) {
			$id_karyawan = $_GET['pencarian'];
			
			// Periksa apakah nama karyawan dipilih
			if (!empty($id_karyawan)) {
				// Redirect ke halaman cetak_filter.php dengan parameter id_karyawan
				header("Location: admin/karyawan/cetak_filter.php?pencarian=$id_karyawan");
				exit(); // Penting untuk menghentikan eksekusi skrip selanjutnya
			} else {
				// Tampilkan pesan kesalahan jika nama karyawan tidak dipilih
				echo "<script>
					alert('Pilih nama karyawan terlebih dahulu!');
					window.location.href = 'index.php?page=data-karyawan';
				</script>";
			}
		}
		?>

					<br>
					
			<div>
					<!-- <a href="?page=tambah-karyawan" class="btn btn-primary mr-2">
					<i class="fa fa-edit"></i> Tambah Data</a> -->
                    <a href="admin/karyawan/cetak_karyawan.php" target="_blank" class="btn btn-info">
					<i class="fa fa-print"></i> Cetak Keseluruhan Karyawan</a>
				
			</div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Karyawan</th>
						<th>Tempat, Tanggal Lahir</th>
						<th>Alamat</th>
						<th>No.Telepon</th>

						<th>Jenis Kelamin</th>
						<th>Agama</th>
						<th>Jabatan</th>
					
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					// $sql = $koneksi->query("SELECT * FROM tb_rumahberlangganan JOIN tb_statuslangganan ON tb_statuslangganan.id_statuslangganan = tb_rumahberlangganan.id_statuslangganan");
					$sql = $koneksi->query("SELECT * FROM tb_karyawan");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
					<td><?= $no++; ?></td>
							<td>
								<?php echo $data['nik']; ?>
							</td>
							<td>
								<?php echo $data['nama_karyawan']; ?>
							</td>
							<td>
								<?php echo $data['ttl']; ?>
							</td>
							<td>
								<?php echo $data['alamat']; ?>
							</td>
							<td>
								<?php echo $data['no_hp']; ?>
							</td>
							<td>
								<?php echo $data['jenis_kelamin']; ?>
							</td>
							<td>
								<?php echo $data['agama']; ?>
							</td>
							<td>
								<?php echo $data['jabatan']; ?>
							</td>
                        
						
                     
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->