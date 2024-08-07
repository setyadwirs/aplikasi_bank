<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i>Data Absensi
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<!-- <a href="?page=tambah-absensi" class="btn btn-warning mr-2">
					<i class="fa fa-edit"></i> Tambah Data</a> -->

				<a href="?page=ambil-barcode" class="btn btn-warning mr-2">
					<i class="fa fa-edit"></i> Ambil Barcode</a>

				<a href="?page=scan-barcode" class="btn btn-secondary mr-2">
					<i class="fa fa-edit"></i> Scan Barcode</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nik</th>
						<th>Nama Karyawan</th>
						<th>Jam Masuk</th>
						<!-- <th>Jam Keluar</th> -->
						<th>Tanggal Masuk</th>
						<!-- <th>Tanggal Keluar</th> -->
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					// $sql = $koneksi->query("SELECT * FROM tb_rumahberlangganan JOIN tb_statuslangganan ON tb_statuslangganan.id_statuslangganan = tb_rumahberlangganan.id_statuslangganan");
					$sql = $koneksi->query("SELECT * FROM tb_absensi JOIN tb_karyawan ON tb_absensi.nik = tb_karyawan.nik");
					while ($data = $sql->fetch_assoc()) {
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
								<?php echo $data['jam_masuk']; ?>
							</td>
							<!-- <td>
								<?php echo $data['jam_keluar']; ?>
							</td> -->
							<td>
								<?php echo $data['tanggal_masuk']; ?>
							</td>
							<!-- <td>
								<?php echo $data['tanggal_keluar']; ?>
							</td> -->
							<td>
								<?php echo $data['status']; ?>
							</td>

							<td>

								<!-- <a href="?page=edit-absensi&kode=<?php echo $data['id_absensi']; ?>" title="Ubah" class="btn btn-warning btn-sm">
									<b class="fa fa-edit"></b>
								</a> -->
								<a href="?page=hapus-absensi&kode=<?php echo $data['id_absensi']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<b class="fa fa-trash"></b>
								</a>


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