<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Data Nasabah
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=tambah-nasabah" class="btn btn-warning">
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
						<th>Tempat, Tanggal Lahir</th>
						<th>Alamat</th>
						<th>No.Telepon</th>
						<th>Jenis Kelamin</th>
						<th>Agama</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Pendapatan</th>
						<th>Email</th>
						<th>Foto</th>
						<th>File KTP</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * FROM tb_nasabah");
					while ($data = $sql->fetch_assoc()) {
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?php echo $data['nama_nasabah']; ?></td>
							<td><?php echo $data['nik']; ?></td>
							<td><?php echo $data['ttl']; ?></td>
							<td><?php echo $data['alamat']; ?></td>
							<td><?php echo $data['no_telepon']; ?></td>
							<td><?php echo $data['jenis_kelamin']; ?></td>
							<td><?php echo $data['agama']; ?></td>
							<td><?php echo $data['nama_ibu']; ?></td>
							<td><?php echo $data['pekerjaan']; ?></td>
							<td><?php echo $data['pendapatan']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td>
								<img src="foto/<?php echo $data['foto']; ?>" alt="Foto" width="100">
							</td>
							<td>
								<a href="foto/<?php echo $data['file_ktp']; ?>" target="_blank" class="btn btn-primary">Lihat File KTP</a>
							</td>

							<td>
								<a href="?page=edit-nasabah&kode=<?php echo $data['id_nasabah']; ?>" title="Ubah" class="btn btn-warning btn-sm">
									<b class="fa fa-edit"></b>
								</a>
								<a href="?page=hapus-nasabah&kode=<?php echo $data['id_nasabah']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<b class="fa fa-trash"></b>
								</a>
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