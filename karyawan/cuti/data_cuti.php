
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Data Cuti
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=tambah-cuti" class="btn btn-warning">
					<i class="fa fa-edit"></i> Tambah Data
				</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Karyawan</th>
						<th>NIK</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Sampai</th>
						<th>Alasan Cuti</th>
						<th>Surat Cuti</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					// Query untuk mengambil data dari tabel tb_cuti
					$nik = $_SESSION['nik']; // Ambil id_pengguna dari session

					$sql = $koneksi->query("SELECT * FROM tb_cuti JOIN tb_karyawan ON tb_cuti.nik = tb_karyawan.nik 
					WHERE tb_cuti.nik = '$nik'");
					while ($data = $sql->fetch_assoc()) {
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?php echo $rew['nik']; ?></td>
							<td><?php echo $rew['nama_karyawan']; ?></td>
							<td><?php echo $data['tanggal_mulai']; ?></td>
							<td><?php echo $data['tanggal_sampai']; ?></td>
							<td><?php echo $data['alasan_cuti']; ?></td>
							<td>
								<a class="btn btn-success" href="../foto/<?php echo $data['foto']; ?>" target="_blank">
									Lihat file
								</a>
							</td>
							<td><?php echo $data['status']; ?></td>
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