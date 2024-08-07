<div class="card">
	<div class="card-header">
		<h3 class="card-title">
			<i class=""></i> Laporan Absensi Pulang
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<br>
			</div>

			<div class="card-body">
				<ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" role="tab" aria-selected="true">Periode pulang Pertanggal</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" role="tab" aria-selected="false"> Seluruh</a>
					</li>
				</ul>
				<div class="tab-content px-1 pt-1">
					<div class="tab-pane active" id="tab11" role="tabpanel" aria-labelledby="base-tab11"><br>
						<div class="row">
							<div class="col-md-3">
								DARI TANGGAL
							</div>
							<div class="col-md-3">
								SAMPAI TANGGAL
							</div>
						</div>

						<div class="row">
							<div class="col-md-3 text-right">
								<form method="GET" action="admin/absensipulang/cetak_filter.php">
									<input class="form-control" type="date" name="start_date" id="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>">
							</div>
							<div class="col-md-3 text-right">
								<input class="form-control" type="date" name="end_date" id="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>">
							</div>

							<div class="col-2">
								<button class="btn btn-info" type="submit" name="filter">Cetak Filter</button>
							</div>
							</form>
						</div>
					</div>
					<div class="tab-pane" id="tab12" role="tabpanel" aria-labelledby="base-tab12"><br>
						<div class="row">

							<a href="admin/absensipulang/cetak_absensipulang.php" target="_blank" class="btn btn-info">
								<i class="fa fa-print"></i> Cetak Semua</a>
							</form>
						</div>


					</div>
				</div>

			</div>
		</div>




		<!-- /.card-body -->

		<div class="card">
			<!-- <div class="card-header">
		<h3 class="card-title">
			<i class=""></i>Data absensipulang</h3>
	</div> -->
			<!-- /.card-header -->
			<div class="card-body">
				<div class="table-responsive">
					<div>
						<!-- <a href="admin/absensipulang/cetak_absensipulang.php" target="_blank" class="btn btn-info">
					<i class="fa fa-print"></i> Cetak Data absensipulang</a> -->
					</div>
					<br>
					<table id="example1" class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nik</th>
								<th>Nama Karyawan</th>
								<th>Jam pulang</th>
								<th>Tanggal pulang</th>
								<th>Status</th>

							</tr>
						</thead>
						<tbody>

							<?php
							$no = 1;
							// $sql = $koneksi->query("SELECT * FROM tb_rumahberlangganan JOIN tb_statuslangganan ON tb_statuslangganan.id_statuslangganan = tb_rumahberlangganan.id_statuslangganan");
							$sql = $koneksi->query("SELECT * FROM tb_absensipulang JOIN tb_karyawan ON tb_absensipulang.nik = tb_karyawan.nik");
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
										<?php echo $data['jam_pulang']; ?>
									</td>

									<td>
										<?php echo $data['tanggal_pulang']; ?>
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