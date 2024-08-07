<div class="card">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Data Cuti
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>

			<a href="admin/cuti/cetak_cuti.php" target="_blank" class="btn btn-info">
					<i class="fa fa-print"></i> Cetak Data Cuti</a>

			</div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Karyawan</th>
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
					// $sql = $koneksi->query("SELECT * FROM tb_rumahberlangganan JOIN tb_statuslangganan ON tb_statuslangganan.id_statuslangganan = tb_rumahberlangganan.id_statuslangganan");
					$sql = $koneksi->query("SELECT * FROM tb_cuti JOIN tb_karyawan ON tb_cuti.id_karyawan = tb_karyawan.id_karyawan");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td><?= $no++; ?></td>
							<td>
								<?php echo $data['nama_karyawan']; ?>
							</td>
							<td>
								<?php echo $data['tanggal_mulai']; ?>
							</td>
							<td>
								<?php echo $data['tanggal_sampai']; ?>
							</td>
							<td>
								<?php echo $data['alasan_cuti']; ?>
							</td>

							<td>
								<a class="btn btn-success" href="./foto/<?php echo $data['foto'] ?>">
									Lihat file
								</a>
							</td>

							<td>
								<?php echo $data['status']; ?>
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