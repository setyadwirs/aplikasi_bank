<?php
  $sql = $koneksi->query("SELECT COUNT(id_karyawan) as tot_karyawan  from tb_karyawan");
  while ($data= $sql->fetch_assoc()) {
    $karyawan=$data['tot_karyawan'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_absensi) as tot_absensi  from tb_absensi");
  while ($data= $sql->fetch_assoc()) {
    $absensi=$data['tot_absensi'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_konsumsi) as tot_konsumsi  from tb_konsumsi");
  while ($data= $sql->fetch_assoc()) {
    $konsumsi=$data['tot_konsumsi'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_cuti) as tot_cuti  from tb_cuti");
  while ($data= $sql->fetch_assoc()) {
    $cuti=$data['tot_cuti'];
  }



?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h5>
					<?php echo $karyawan; ?>
				</h5>

				<p>Jumlah Data Karyawan</p>
			</div>
			<div class="icon">
				<!-- <i class="ion ion-stats-bars"></i> -->
			</div>
			<a href="?page=data-karyawan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h5>
					<?php echo $absensi; ?>
				</h5>

				<p>Jumlah Absensi</p>
			</div>
			<div class="icon">
				<!-- <i class="ion ion-stats-bars"></i> -->
			</div>
			<a href="?page=data-absensi" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h5>
					<?php echo $konsumsi; ?>
				</h5>

				<p>Jumlah Konsumsi</p>
			</div>
			<div class="icon">
				<!-- <i class="ion ion-stats-bars"></i> -->
			</div>
			<a href="?page=data-konsumsi" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-fuchsia">
			<div class="inner">
				<h5>
					<?php echo $cuti; ?>
				</h5>

				<p>Jumlah Cuti</p>
			</div>
			<div class="icon">
				<!-- <i class="ion ion-stats-bars"></i> -->
			</div>
			<a href="?page=data-cuti" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>



	