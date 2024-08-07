<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Data Karyawan
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=tambah-karyawan" class="btn btn-warning ">
					<i class="fa fa-edit"></i> Tambah Data</a>

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
						<th>Foto</th>

						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					// $sql = $koneksi->query("SELECT * FROM tb_rumahberlangganan JOIN tb_statuslangganan ON tb_statuslangganan.id_statuslangganan = tb_rumahberlangganan.id_statuslangganan");
					$sql = $koneksi->query("SELECT * FROM tb_karyawan");
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

							<td align="center">
								<img src="./foto/<?php echo $data['foto']; ?>" width="120px" />
							</td>


							<td>

								<a href="?page=edit-karyawan&kode=<?php echo $data['id_karyawan']; ?>" title="Ubah" class="btn btn-warning btn-sm">
									<b class="fa fa-edit"></b>
								</a>
								<a href="?page=hapus-karyawan&kode=<?php echo $data['id_karyawan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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