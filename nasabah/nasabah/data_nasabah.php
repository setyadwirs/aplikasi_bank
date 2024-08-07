<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">Data Nasabah</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=edit-nasabah" class="btn btn-warning">
					<i class="fa fa-edit"></i> Edit Data
				</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Nasabah</th>
						<th>NIK</th>
						<th>Tempat, Tanggal Lahir</th>
						<th>Alamat</th>
						<th>No.Telepon</th>
						<th>Jenis Kelamin</th>
						<th>Agama</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Pendapatan</th>
						<th>Foto</th>
						<th>File KTP</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					// Mengambil data berdasarkan NIK dari session
					$nik_session = $_SESSION['nik'];
					$sql = $koneksi->query("SELECT * FROM tb_nasabah WHERE nik = '$nik_session'");
					while ($data = $sql->fetch_assoc()) {
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?php echo htmlspecialchars($data['nama_nasabah']); ?></td>
							<td><?php echo htmlspecialchars($data['nik']); ?></td>
							<td><?php echo htmlspecialchars($data['ttl']); ?></td>
							<td><?php echo htmlspecialchars($data['alamat']); ?></td>
							<td><?php echo htmlspecialchars($data['no_telepon']); ?></td>
							<td><?php echo htmlspecialchars($data['jenis_kelamin']); ?></td>
							<td><?php echo htmlspecialchars($data['agama']); ?></td>
							<td><?php echo htmlspecialchars($data['nama_ibu']); ?></td>
							<td><?php echo htmlspecialchars($data['pekerjaan']); ?></td>
							<td><?php echo htmlspecialchars($data['pendapatan']); ?></td>
							<td>
								<img src="foto/<?php echo htmlspecialchars($data['foto']); ?>" alt="Foto" width="100">
							</td>
							<td>
								<a href="foto/<?php echo htmlspecialchars($data['file_ktp']); ?>" target="_blank" class="btn btn-primary">Lihat File KTP</a>
							</td>

						</tr>
					<?php
					}
					?>
				</tbody>
				<tfoot>
					<!-- Optional: Add any additional footer content if necessary -->
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
</div>