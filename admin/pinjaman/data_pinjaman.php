<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Data Pinjaman
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=tambah-pinjaman" class="btn btn-warning ">
					<i class="fa fa-edit"></i> Tambah Data</a>

			</div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pinjaman</th>
						<th>NIK</th>
						<th>Email</th>
						<th>Tanggal Pengajuan</th>
						<th>Jumlah Pinjaman</th>
						<th>Keperluan</th>
						<th>Status Pengajuan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					// $sql = $koneksi->query("SELECT * FROM tb_rumahberlangganan JOIN tb_statuslangganan ON tb_statuslangganan.id_statuslangganan = tb_rumahberlangganan.id_statuslangganan");
					$sql = $koneksi->query("SELECT * FROM tb_pinjaman");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td><?= $no++; ?></td>
							<td>
								<?php echo $data['nama_nasabah']; ?>
							</td>
							<td>
								<?php echo $data['nik']; ?>
							</td>
							<td>
								<?php echo $data['email']; ?>
							</td>
							<td>
								<?php echo $data['tanggal_pengajuan']; ?>
							</td>
							<td>
								<?php echo $data['jumlah_pinjaman']; ?>
							</td>

							<td>
								<?php echo $data['keperluan']; ?>
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
								<button class="<?php echo $button_class; ?>" disabled><?php echo $status; ?></button>
							</td>


							<td>

								<a href="?page=edit-pinjaman&kode=<?php echo $data['id_pinjaman']; ?>" title="Ubah" class="btn btn-warning btn-sm">
									<b class="fa fa-edit"></b>
								</a>
								<a href="?page=hapus-pinjaman&kode=<?php echo $data['id_pinjaman']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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