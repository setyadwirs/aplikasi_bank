<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Data Konsumsi
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<!-- <a href="?page=tambah-konsumsi" class="btn btn-warning ">
                <i class="fa fa-edit"></i> Tambah Data</a> -->
			<br>
			<table id="example1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nik</th>
						<th>Nama Karyawan</th>
						<th>Tanggal</th>
						<th>Dana Konsumsi</th>
						<th>Status</th>
						<!-- <th>Aksi</th> -->
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$nik = $_SESSION['nik']; // Ambil nik dari session
					// Pastikan query SQL sesuai dengan nama tabel dan kolom yang ada
					$sql = $koneksi->query("SELECT tb_konsumsi.*, tb_karyawan.nama_karyawan FROM tb_konsumsi JOIN tb_karyawan ON tb_konsumsi.nik = tb_karyawan.nik
					   WHERE tb_konsumsi.nik = '$nik'");

					while ($data = $sql->fetch_assoc()) {
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= htmlspecialchars($data['nik']); ?></td>
							<td><?= htmlspecialchars($data['nama_karyawan']); ?></td>
							<td><?= htmlspecialchars($data['tanggal_pulang']); ?></td>
							<td>Rp. <?= number_format($data['dana_konsumsi'], 0, ',', '.'); ?></td>
							<td><?= htmlspecialchars($data['status']); ?></td>
							<!-- <td>
                                <a href="?page=edit-konsumsi&kode=<?= $data['id_konsumsi']; ?>" title="Ubah" class="btn btn-warning btn-sm">
                                    <b class="fa fa-edit"></b>
                                </a>
                                <a href="?page=hapus-konsumsi&kode=<?= $data['id_konsumsi']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <b class="fa fa-trash"></b>
                                </a>
                            </td> -->
						</tr>
					<?php
					}
					?>
				</tbody>
				<tfoot>
					<!-- Jika Anda ingin menambahkan footer tabel -->
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
</div>