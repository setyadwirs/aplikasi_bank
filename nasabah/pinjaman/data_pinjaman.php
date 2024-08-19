<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Data Pinjaman
		</h3>
		<div class="card-tools">
			<!-- Tombol Toggle Gambar -->
			<button id="toggleImage" class="btn btn-danger btn-sm">
				<i class="fa fa-image"></i> Tampilkan Brosur Peminjaman
			</button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<!-- <div>
                <a href="?page=tambah-pinjaman" class="btn btn-warning">
                    <i class="fa fa-edit"></i> Tambah Data
                </a>
            </div> -->
			<br>
			<!-- Menampilkan Gambar Brosur -->
			<div id="imageContainer" class="text-center mb-3" style="display: none;">
				<img src="../dist/brosur.jpg" alt="Brosur" class="img-fluid" style="max-width: 100%; height: auto;">
				<div class="mt-2">
					<!-- Link Download -->
					<a href="../dist/brosur.jpg" class="btn btn-danger btn-sm" download>
						<i class="fa fa-download"></i> Unduh Gambar
					</a>
				</div>
			</div>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pinjaman</th>
						<th>NIK</th>
						<th>Email</th>
						<th>Tanggal Pengajuan</th>
						<th>Jumlah Pinjaman</th>
						<th>Jaminan</th>
						<th>Keperluan</th>
						<th>Tanggal Survei</th>
						<th>Status Survei</th>
						<th>Status Pengajuan</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$nik = $_SESSION['nik']; // Ambil NIK dari session

					// Query untuk mengambil data dari tabel tb_pinjaman sesuai NIK pengguna
					$sql = $koneksi->query("SELECT * FROM tb_pinjaman WHERE nik = '$nik'");

					if ($sql === false) {
						die("Query error: " . $koneksi->error);
					}

					while ($data = $sql->fetch_assoc()) {
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?php echo htmlspecialchars($data['nama_nasabah']); ?></td>
							<td><?php echo htmlspecialchars($data['nik']); ?></td>
							<td><?php echo htmlspecialchars($data['email']); ?></td>
							<td><?php echo htmlspecialchars($data['tanggal_pengajuan']); ?></td>
							<td><?php echo htmlspecialchars($data['jumlah_pinjaman']); ?></td>
							<td><?php echo htmlspecialchars($data['jaminan']); ?></td>

							<td><?php echo htmlspecialchars($data['keperluan']); ?></td>
							<td><?php echo htmlspecialchars($data['tanggal_survei']); ?></td>
							<td>
								<?php
								$status = $data['status_survei'];
								$button_class = '';
								switch ($status) {
									case 'Disurvei':
										$button_class = 'btn btn-primary btn-sm';
										break;
									case 'Belum Disurvei':
										$button_class = 'btn btn-success btn-sm';
										break;
								
									default:
										$button_class = 'btn btn-secondary btn-sm';
										break;
								}
								?>
								<button class="<?php echo $button_class; ?>" disabled><?php echo htmlspecialchars($status); ?></button>
							</td>
							<td>
								<?php
								$status = $data['status_pengajuan'];
								$button_class = '';
								switch ($status) {
									case 'Diajukan':
										$button_class = 'btn btn-primary btn-sm';
										break;
									case 'Disetujui':
										$button_class = 'btn btn-success btn-sm';
										break;
									case 'Ditolak':
										$button_class = 'btn btn-danger btn-sm';
										break;
									default:
										$button_class = 'btn btn-secondary btn-sm';
										break;
								}
								?>
								<button class="<?php echo $button_class; ?>" disabled><?php echo htmlspecialchars($status); ?></button>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
</div>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>

<!-- JavaScript untuk Toggle Gambar -->
<script>
	document.getElementById('toggleImage').addEventListener('click', function() {
		var imageContainer = document.getElementById('imageContainer');
		if (imageContainer.style.display === 'none' || imageContainer.style.display === '') {
			imageContainer.style.display = 'block';
			this.innerHTML = '<i class="fa fa-image"></i> Sembunyikan Gambar';
		} else {
			imageContainer.style.display = 'none';
			this.innerHTML = '<i class="fa fa-image"></i> Tampilkan Gambar';
		}
	});
</script>