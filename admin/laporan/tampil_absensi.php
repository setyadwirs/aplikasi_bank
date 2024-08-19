<div class="card">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Laporan Absensi
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" role="tab" aria-selected="true">Absensi Masuk</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" role="tab" aria-selected="false">Absensi Pulang</a>
				</li>
			</ul>
			<div class="tab-content px-1 pt-1">
				<!-- Absensi Masuk -->
				<div class="tab-pane active" id="tab1" role="tabpanel" aria-labelledby="base-tab1">
					<br>
					<div class="row">
						<div class="col-md-3">DARI TANGGAL</div>
						<div class="col-md-3">SAMPAI TANGGAL</div>
						<div class="col-md-3">STATUS</div>
					</div>
					<div class="row">
						<div class="col-md-3 text-right">
							<form method="GET" action="admin/absensi/absensi_status.php">
								<input class="form-control" type="date" name="start_date" id="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>">
						</div>
						<div class="col-md-3 text-right">
							<input class="form-control" type="date" name="end_date" id="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>">
						</div>
						<div class="col-md-3 text-right">
							<select class="form-control" name="status" id="status">
								<option value="">Semua Status</option>
								<option value="Hadir" <?php echo isset($_GET['status']) && $_GET['status'] == 'Hadir' ? 'selected' : ''; ?>>Hadir</option>
								<option value="Telat" <?php echo isset($_GET['status']) && $_GET['status'] == 'Telat' ? 'selected' : ''; ?>>Telat</option>
								<option value="Lembur" <?php echo isset($_GET['status']) && $_GET['status'] == 'Lembur' ? 'selected' : ''; ?>>Lembur</option>
							</select>
						</div>
						<div class="col-2">
							<button class="btn btn-info" type="submit" name="filter">Cetak Filter</button>
						</div>
						</form>
					</div>
					<br>
					<table id="example1" class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nik</th>
								<th>Nama Karyawan</th>
								<th>Jam Masuk</th>
								<th>Tanggal Masuk</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
							$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
							$status = isset($_GET['status']) ? $_GET['status'] : '';

							$sql = "SELECT * FROM tb_absensi
                                    JOIN tb_karyawan ON tb_absensi.nik = tb_karyawan.nik
                                    WHERE 1=1";

							if ($start_date && $end_date) {
								$sql .= " AND tanggal_masuk BETWEEN '$start_date' AND '$end_date'";
							}

							if ($status) {
								$sql .= " AND status = '$status'";
							}

							$sql .= " ORDER BY tanggal_masuk ASC";

							$query = $koneksi->query($sql);
							$no = 1;
							while ($data = $query->fetch_assoc()) {
							?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?php echo $data['nik']; ?></td>
									<td><?php echo $data['nama_karyawan']; ?></td>
									<td><?php echo $data['jam_masuk']; ?></td>
									<td><?php echo $data['tanggal_masuk']; ?></td>
									<td><?php echo $data['status']; ?></td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>

				<!-- Absensi Pulang -->
				<div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="base-tab2">
					<br>
					<div class="row">
						<div class="col-md-3">DARI TANGGAL</div>
						<div class="col-md-3">SAMPAI TANGGAL</div>
						<div class="col-md-3">STATUS</div>
					</div>
					<div class="row">
						<div class="col-md-3 text-right">
							<form method="GET" action="admin/absensi/absensipulang_status.php">
								<input class="form-control" type="date" name="start_date" id="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>">
						</div>
						<div class="col-md-3 text-right">
							<input class="form-control" type="date" name="end_date" id="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>">
						</div>
						<div class="col-md-3 text-right">
							<select class="form-control" name="status" id="status">
								<option value="">Semua Status</option>
								<option value="Hadir" <?php echo isset($_GET['status']) && $_GET['status'] == 'Hadir' ? 'selected' : ''; ?>>Hadir</option>
								<option value="Telat" <?php echo isset($_GET['status']) && $_GET['status'] == 'Telat' ? 'selected' : ''; ?>>Telat</option>
								<option value="Lembur" <?php echo isset($_GET['status']) && $_GET['status'] == 'Lembur' ? 'selected' : ''; ?>>Lembur</option>
							</select>
						</div>
						<div class="col-2">
							<button class="btn btn-info" type="submit" name="filter">Cetak Filter</button>
						</div>
						</form>
					</div>
					<br>
					<table id="example2" class="table table-bordered">
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
							$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
							$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
							$status = isset($_GET['status']) ? $_GET['status'] : '';

							$sql = "SELECT * FROM tb_absensipulang
                                    JOIN tb_karyawan ON tb_absensipulang.nik = tb_karyawan.nik
                                    WHERE 1=1";

							if ($start_date && $end_date) {
								$sql .= " AND tanggal_pulang BETWEEN '$start_date' AND '$end_date'";
							}

							if ($status) {
								$sql .= " AND status = '$status'";
							}

							$sql .= " ORDER BY tanggal_pulang ASC";

							$query = $koneksi->query($sql);
							$no = 1;
							while ($data = $query->fetch_assoc()) {
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
					</table>
				</div>
			</div>
		</div>
	</div>
</div>