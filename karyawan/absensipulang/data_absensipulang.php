<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Data Absensi Pulang
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=ambil-barcode-pulang" class="btn btn-warning mr-2">
					<i class="fa fa-edit"></i> Ambil Barcode
				</a>
				<a href="?page=scan-barcode-pulang" class="btn btn-secondary mr-2">
					<i class="fa fa-edit"></i> Scan Barcode
				</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nik</th>
						<th>Nama Karyawan</th>
						<th>Jam Pulang</th>
						<th>Tanggal Pulang</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$nik = $_SESSION['nik']; // Ambil nik dari session

					// Query untuk mengambil data absensi pulang
					$sql = $koneksi->query("SELECT tb_absensipulang.*, tb_karyawan.nama_karyawan 
                                            FROM tb_absensipulang 
                                            JOIN tb_karyawan ON tb_absensipulang.nik = tb_karyawan.nik 
                                            WHERE tb_absensipulang.nik = '$nik'");

					while ($data = $sql->fetch_assoc()) {
						$status = $data['status'];
						// Tentukan kelas berdasarkan status
						$statusClass = ($status === 'Hadir') ? 'btn-success' : 'btn-danger';
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?php echo $data['nik']; ?></td>
							<td><?php echo $data['nama_karyawan']; ?></td>
							<td><?php echo $data['jam_pulang']; ?></td>
							<td><?php echo $data['tanggal_pulang']; ?></td>
							<td>
								<button class="btn <?php echo $statusClass; ?>" disabled><?php echo $status; ?></button>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
</div>