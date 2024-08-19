<?php
@session_start();
include "inc/koneksi.php";

if (@$_SESSION['Admin']) {
	$id_login = @$_SESSION['Admin'];

	$view = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna='$id_login'");
	$rew = mysqli_fetch_array($view);


?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>BANK KALSEL</title>
		<link rel="icon" href="dist/img/logo.png">
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="dist/css/adminlte.min.css">
		<!-- Select2 -->
		<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
		<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<!-- Alert -->
		<script src="plugins/alert.js"></script>
		<!-- Auto Refresh -->
		<script src="jquery-3.1.1.js" type="text/javascript"></script>
		<script type="text/javascript" src="assets/js/qrcodelib.js"></script>
	</head>

	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-dark">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#">
							<i class="fas fa-bars"></i>
						</a>
					</li>

				</ul>

				<!-- SEARCH FORM -->
				<ul class="navbar-nav ml-auto">

					<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
						<p>
							<i class="nav-icon fas fa-sign-out-alt text-danger mr-1"></i>
							Logout

						</p>
					</a>



				</ul>

			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->

			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->


				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>

					<li class="nav-item">
						<a class="navbar-brand " href="#">

							<marquee>
								<h2 class="brand-text text-bold text-white" style="font-size: 23px">APLIKASI BANK KALSEL BANJARBARU</h2>
							</marquee>
						</a>

					</li>
				</ul>


				<!-- Sidebar -->
				<div class="sidebar">


					<!-- Sidebar user (optional) -->
					<div class="user-panel mt-12 pb-3 mb-9 d-flex">
						<div class="image">
							<img src="dist/img/avatar.jpg" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<a href="index.php" class="d-block">
								<?php echo $rew['nama']; ?>
							</a>
							<span class="badge badge-success">
								<?php echo $rew['level']; ?>
							</span>
						</div>
					</div>
					<br>

					<center>
						<span class="text-bold text-white">MENU UTAMA</span>
					</center>

					<!-- Sidebar Menu -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



							<!-- Level  -->
							<?php
							if ($rew['level'] == "Admin") {
							?>

								<li class="nav-item">
									<a href="index.php" class="nav-link">
										<i class="nav-icon fas fa-home"></i>
										<p>
											Dashboard
										</p>
									</a>
								</li>

								<li class="nav-item has-treeview">
									<a href="?page=data-pengguna" class="nav-link">
										<i class="nav-icon fas fa-user"></i>
										<p>
											Data Pengguna
										</p>
									</a>

								<li class="nav-item has-treeview">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-list"></i>
										<p>
											Data Master
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-karyawan" class="nav-link">
												<i class="nav-icon  fab fa-strava text-warning"></i>
												<p class="">Data Karyawan</p>
											</a>
										</li>
									</ul>

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-absensi" class="nav-link">
												<i class="nav-icon  fab fa-strava text-warning"></i>
												<p class="">Data Absensi Datang</p>
											</a>
										</li>
									</ul>

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-absensipulang" class="nav-link">
												<i class="nav-icon  fab fa-strava text-warning"></i>
												<p class="">Data Absensi Pulang</p>
											</a>
										</li>
									</ul>

									<!-- <ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=scan-barcode" class="nav-link">
												<i class="nav-icon  fab fa-strava text-warning"></i>
												<p class="">Scan Barcode</p>
											</a>
										</li>
									</ul> -->

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-konsumsi" class="nav-link">
												<i class="nav-icon  fab fa-strava text-warning"></i>
												<p class="">Data Konsumsi</p>
											</a>
										</li>
									</ul>

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-cuti" class="nav-link">
												<i class="nav-icon  fab fa-strava text-warning"></i>
												<p class="">Data Karyawan Cuti</p>
											</a>
										</li>
									</ul>

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-nasabah" class="nav-link">
												<i class="nav-icon  fab fa-strava text-warning"></i>
												<p class="">Data Nasabah</p>
											</a>
										</li>
									</ul>


									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-pinjaman" class="nav-link">
												<i class="nav-icon  fab fa-strava text-warning"></i>
												<p class="">Data Pengajuan Pinjaman</p>
											</a>
										</li>
									</ul>




								</li>


								<li class="nav-item has-treeview">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-print"></i>
										<p>
											Laporan
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-tampilkaryawan" class="nav-link">
												<i class="nav-icon  fas fa-tint text-danger"></i>
												<p class="">Karyawan</p>
											</a>
										</li>
									</ul>

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-tampilabsensi" class="nav-link">
												<i class="nav-icon  fas fa-tint text-danger"></i>
												<p class="">Absensi Karyawan</p>
											</a>
										</li>
									</ul>

									<!-- <ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-tampilabsensipulang" class="nav-link">
												<i class="nav-icon  fas fa-tint text-danger"></i>
												<p class="">Absensi Pulang</p>
											</a>
										</li>
									</ul> -->

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-tampilkonsumsi" class="nav-link">
												<i class="nav-icon  fas fa-tint text-danger"></i>
												<p class="">Konsumsi</p>
											</a>
										</li>
									</ul>


									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-tampilcuti" class="nav-link">
												<i class="nav-icon  fas fa-tint text-danger"></i>
												<p class="">Cuti</p>
											</a>
										</li>
									</ul>

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-tampilnasabah" class="nav-link">
												<i class="nav-icon  fas fa-tint text-danger"></i>
												<p class="">Nasabah</p>
											</a>
										</li>
									</ul>

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-tampilpinjaman" class="nav-link">
												<i class="nav-icon  fas fa-tint text-danger"></i>
												<p class="">Pinjaman</p>
											</a>
										</li>
									</ul>

									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="?page=data-tampilgrafikcuti" class="nav-link">
												<i class="nav-icon  fas fa-tint text-danger"></i>
												<p class="">Grafik Cuti</p>
											</a>
										</li>
									</ul>





								</li>








							<?php
							} elseif ($data_level == "KepalaLurah") {
							?>

								<li class="nav-item">
									<a href="index.php" class="nav-link">
										<i class="nav-icon fas fa-tachometer-alt"></i>
										<p>
											Dashboard
										</p>
									</a>
								</li>

								<li class="nav-item has-treeview">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-map"></i>
										<p>
											Data Master
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<!-- 
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-kelurahan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Kelurahan</p>
										</a>
									</li>
								</ul> -->
								</li>


							<?php
							} elseif ($data_level == "KepalaBidang") {
							?>


							<?php
							}
							?>



					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
				</section>

				<!-- Main content -->
				<section class="content">
					<!-- /. WEB DINAMIS DISINI ############################################################################### -->
					<div class="container-fluid">

						<?php
						if (isset($_GET['page'])) {
							$hal = $_GET['page'];

							switch ($hal) {
									//Klik Halaman Home Pengguna
								case 'admin':
									include "home/dashboard_admin.php";
									break;
								case 'KepalaLurah':
									include "home/berandakabid.php";
									break;
								case 'KepalaBidang':
									include "home/admin.php";
									break;

									//data-jenisberkas
								case 'data-surattugas':
									include "admin/surat_tugas/lihat_surattugas.php";
									break;
								case 'tambah-surattugas':
									include "admin/surat_tugas/tambah_tugas.php";
									break;
								case 'edit-jenisberkas':
									include "admin/jenisberkas/edit_jenisberkas.php";
									break;
								case 'hapus-jenisberkas':
									include "admin/jenisberkas/hapus_jenisberkas.php";
									break;

									//data-jenisberkas
								case 'data-jenisberkas':
									include "admin/jenisberkas/data_jenisberkas.php";
									break;
								case 'tambah-jenisberkas':
									include "admin/jenisberkas/tambah_jenisberkas.php";
									break;
								case 'edit-jenisberkas':
									include "admin/jenisberkas/edit_jenisberkas.php";
									break;
								case 'hapus-jenisberkas':
									include "admin/jenisberkas/hapus_jenisberkas.php";
									break;

									//data-suratpengajuan
								case 'data-suratpengajuan':
									include "admin/suratpengajuan/suratpengajuan.php";
									break;
								case 'tambah-pengajuan':
									include "admin/suratpengajuan/tambah.php";
									break;
								case 'edit-pengajuan':
									include "admin/suratpengajuan/edit.php";
									break;
								case 'hapus-pengajuan':
									include "admin/suratpengajuan/hapus.php";
									break;

									//data-cuti
								case 'data-cuti':
									include "admin/cuti/data_cuti.php";
									break;
								case 'tambah-cuti':
									include "admin/cuti/tambah_cuti.php";
									break;
								case 'edit-cuti':
									include "admin/cuti/edit_cuti.php";
									break;
								case 'hapus-cuti':
									include "admin/cuti/hapus_cuti.php";
									break;
								case 'pengajuan':
									include "admin/cuti/pengajuan.php";
									break;
								case 'proses-pengajuan':
									include "admin/cuti/proses_pengajuan.php";
									break;
								case 'setuju':
									include "admin/cuti/setuju.php";
									break;

								case 'tolak':
									include "admin/cuti/tolak.php";
									break;


									//data-absensi
								case 'data-absensi':
									include "admin/absensi/data_absensi.php";
									break;
								case 'tambah-absensi':
									include "admin/absensi/tambah_absensi.php";
									break;
								case 'edit-absensi':
									include "admin/absensi/edit_absensi.php";
									break;
								case 'hapus-absensi':
									include "admin/absensi/hapus_absensi.php";
									break;

								case 'scan-barcode':
									include "admin/absensi/scan_barcode.php";
									break;

								case 'ambil-barcode':
									include "admin/absensi/ambil_barcode.php";
									break;

									//data-karyawan
								case 'data-karyawan':
									include "admin/karyawan/data_karyawan.php";
									break;
								case 'tambah-karyawan':
									include "admin/karyawan/tambah_karyawan.php";
									break;
								case 'edit-karyawan':
									include "admin/karyawan/edit_karyawan.php";
									break;
								case 'hapus-karyawan':
									include "admin/karyawan/hapus_karyawan.php";
									break;

									//data-konsumsi
								case 'data-konsumsi':
									include "admin/konsumsi/data_konsumsi.php";
									break;
								case 'tambah-konsumsi':
									include "admin/konsumsi/tambah_konsumsi.php";
									break;
								case 'edit-konsumsi':
									include "admin/konsumsi/edit_konsumsi.php";
									break;
								case 'hapus-konsumsi':
									include "admin/konsumsi/hapus_konsumsi.php";
									break;

									//data-Pengguna
								case 'data-pengguna':
									include "admin/pengguna/data_pengguna.php";
									break;
								case 'tambah-pengguna':
									include "admin/pengguna/tambah_pengguna.php";
									break;
								case 'edit-pengguna':
									include "admin/pengguna/edit_pengguna.php";
									break;
								case 'hapus-pengguna':
									include "admin/pengguna/hapus_pengguna.php";
									break;

									//data-nasabah
								case 'data-nasabah':
									include "admin/nasabah/data_nasabah.php";
									break;
								case 'tambah-nasabah':
									include "admin/nasabah/tambah_nasabah.php";
									break;
								case 'edit-nasabah':
									include "admin/nasabah/edit_nasabah.php";
									break;
								case 'hapus-nasabah':
									include "admin/nasabah/hapus_nasabah.php";
									break;


									//data-pinjaman
								case 'data-pinjaman':
									include "admin/pinjaman/data_pinjaman.php";
									break;
								case 'tambah-pinjaman':
									include "admin/pinjaman/tambah_pinjaman.php";
									break;
								case 'edit-pinjaman':
									include "admin/pinjaman/edit_pinjaman.php";
									break;
								case 'hapus-pinjaman':
									include "admin/pinjaman/hapus_pinjaman.php";
									break;


									//data-absensipulang
								case 'data-absensipulang':
									include "admin/absensipulang/data_absensipulang.php";
									break;
								case 'tambah-absensipulang':
									include "admin/absensipulang/tambah_absensipulang.php";
									break;
								case 'edit-absensipulang':
									include "admin/absensipulang/edit_absensipulang.php";
									break;
								case 'hapus-absensipulang':
									include "admin/absensipulang/hapus_absensipulang.php";
									break;

								case 'scan-barcode-pulang':
									include "admin/absensipulang/scan_barcode.php";
									break;

								case 'ambil-barcode-pulang':
									include "admin/absensipulang/ambil_barcode.php";
									break;




									//Laporan Aplikasi Bank Kalsel
								case 'data-tampilkaryawan':
									include "admin/laporan/tampil_karyawan.php";
									break;
								case 'data-tampilabsensi':
									include "admin/laporan/tampil_absensi.php";
									break;
								case 'data-tampilabsensipulang':
									include "admin/laporan/tampil_absensipulang.php";
									break;
								case 'data-tampilcuti':
									include "admin/laporan/tampil_cuti.php";
									break;
								case 'data-tampilkonsumsi':
									include "admin/laporan/tampil_konsumsi.php";
									break;
								case 'data-tampilgrafikcuti':
									include "admin/laporan/tampil_grafikcuti.php";
									break;

								case 'data-tampilnasabah':
									include "admin/laporan/tampil_nasabah.php";
									break;

								case 'data-tampilpinjaman':
									include "admin/laporan/tampil_pinjaman.php";
									break;





									//default
								default:
									echo "<center><h1> ERROR !</h1></center>";
									break;
							}
						} else {
							// Auto Halaman Home Pengguna
							if ($rew['level'] == "Admin") {
								include "home/dashboard_admin.php";
							} elseif ($rew['jabatan'] == "KepalaLurah") {
								include "home/berandalurah.php";
							} elseif ($rew['jabatan'] == "KepalaBidang") {
								include "home/berandakabid.php";
							}
						}
						?>

					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<footer class="main-footer bg-dark">
				<div class="float-right d-none d-sm-block">
					Copyright &copy;
					<a target="_blank" href="">
						<strong>APLIKASI BANK KALSEL</strong>
					</a>

				</div>
				BANK KALSEL KCPS Q-MALL
			</footer>

			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->

		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Select2 -->
		<script src="plugins/select2/js/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		<!-- page script -->
		<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

		<script>
			$(function() {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false,
				});
			});
		</script>

		<script>
			$(function() {
				//Initialize Select2 Elements
				$('.select2').select2()

				//Initialize Select2 Elements
				$('.select2bs4').select2({
					theme: 'bootstrap4'
				})
			})
		</script>

	</body>

	</html>
<?php
} else {
	header("location:login.php");
}
?>