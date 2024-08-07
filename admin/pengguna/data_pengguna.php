<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Data Pengguna
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=tambah-pengguna" class="btn btn-warning ">
					<i class="fa fa-edit"></i> Tambah Data</a>

			</div>
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nik</th>
						<th>Nama</th>
						<th>Telepon</th>
						<th>Alamat</th>
						<th>Level</th>
						<th>Username</th>
						<th>Password</th>
						<th>Foto</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					// $sql = $koneksi->query("SELECT * FROM tb_rumahberlangganan JOIN tb_statuslangganan ON tb_statuslangganan.id_statuslangganan = tb_rumahberlangganan.id_statuslangganan");
					$sql = $koneksi->query("SELECT * FROM tb_pengguna");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td><?= $no++; ?></td>
							<td>
								<?php echo $data['nik']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['telepon']; ?>
							</td>
							<td>
								<?php echo $data['alamat']; ?>
							</td>
							<td>
								<?php echo $data['level']; ?>
							</td>
							<td><?= $data['username'] ?></td>
							<td><?= $data['password'] ?></td>

							<td align="center">
							<img src="./foto/<?php echo $data['foto']; ?>" width="120px" />
							</td>

							<td>

								<a href="?page=edit-pengguna&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah" class="btn btn-warning btn-sm">
									<b class="fa fa-edit"></b>
								</a>
								<a href="?page=hapus-pengguna&kode=<?php echo $data['id_pengguna']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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