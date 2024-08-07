<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i>Data Absensi Pulang
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<!-- <a href="?page=tambah-absensipulang" class="btn btn-warning mr-2">
                    <i class="fa fa-edit"></i> Tambah Data</a> -->

				<a href="?page=ambil-barcode-pulang" class="btn btn-warning mr-2">
					<i class="fa fa-edit"></i> Ambil Barcode</a>

				<a href="?page=scan-barcode-pulang" class="btn btn-secondary mr-2">
					<i class="fa fa-edit"></i> Scan Barcode</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nik</th>
						<th>Nama Karyawan</th>
						<th>Jam Pulang</th>
						<!-- <th>Jam Keluar</th> -->
						<th>Tanggal Masuk</th>
						<!-- <th>Tanggal Keluar</th> -->
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					

					$sql = $koneksi->query("SELECT * FROM tb_absensipulang 
					 JOIN tb_karyawan ON tb_absensipulang.nik = tb_karyawan.nik 
                                           ");

					while ($data = $sql->fetch_assoc()) {
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?php echo $data['nik']; ?></td>
							<td><?php echo $data['nama_karyawan']; ?></td>
							<td><?php echo $data['jam_pulang']; ?></td>
							<td><?php echo $data['tanggal_pulang']; ?></td>
							<td><?php echo $data['status']; ?></td>
						</tr>
					<?php
					}
					?>
				</tbody>
				<tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
</div>