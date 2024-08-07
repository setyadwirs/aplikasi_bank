<?php
@session_start();
include "../inc/koneksi.php";

if (@$_SESSION['Karyawan']) {
    $id_login = @$_SESSION['Karyawan'];
    $view = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id_login'");
    $rew = mysqli_fetch_array($view);


?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>APLIKASI PEMINJAMAN</title>
        <link rel="icon" href="../dist/img/logo.png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Alert -->
        <script src="../plugins/alert.js"></script>
        <!-- Auto Refresh -->
        <script src="../jquery-3.1.1.js" type="text/javascript"></script>
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

                    <a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="../logout.php" class="nav-link">
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

                            <marquee direction="left">
                                <h2 class="brand-text text-bold text-white" style="font-size: 23px">APLIKASI BANK KALSEL BANJARBARU</h2>
                            </marquee>
                        </a>

                    </li>
                </ul>


                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <?php
                            // Ganti "nama_kolom_foto" dengan nama kolom sebenarnya di tabel Anda (misalnya, "foto")
                            $foto_profil = ($rew['foto']) ? '../foto/' . $rew['foto'] : '';
                            ?>
                            <img src="<?php echo $foto_profil; ?>" class="d-flex align-items-center justify-content-center" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="index.php" class="d-block">
                                <?php echo $rew['nama_karyawan']; ?>
                            </a>
                            <span class="badge badge-success">
                                <?php echo $rew['level']; ?>
                            </span>
                        </div>
                    </div>
                    <center>
                        <span class="text-bold text-white">MENU UTAMA</span>
                    </center>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



                            <!-- Level  -->
                            <?php
                            if ($rew['level'] == "Karyawan") {
                            ?>

                                <li class="nav-item">
                                    <a href="?page=dashboard" class="nav-link">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>

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
                                            <a href="?page=data-absensi" class="nav-link">
                                                <i class="nav-icon  fas fa-check text-warning"></i>
                                                <p class="">Data Absensi Datang</p>
                                            </a>
                                        </li>
                                    </ul>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="?page=data-absensipulang" class="nav-link">
                                                <i class="nav-icon  fas fa-check text-warning"></i>
                                                <p class="">Data Absensi Pulang</p>
                                            </a>
                                        </li>
                                    </ul>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="?page=data-konsumsi" class="nav-link">
                                                <i class="nav-icon  fas fa-check text-warning"></i>
                                                <p class="">Data Konsumsi</p>
                                            </a>
                                        </li>
                                    </ul>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="?page=data-cuti" class="nav-link">
                                                <i class="nav-icon  fas fa-check text-warning"></i>
                                                <p class="">Data Cuti</p>
                                            </a>
                                        </li>
                                    </ul>


                                </li>



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
                                case 'dashboard':
                                    include "../home/dashboard_karyawan.php";
                                    break;

                                    //data-cuti
                                case 'data-cuti':
                                    include "cuti/data_cuti.php";
                                    break;
                                case 'tambah-cuti':
                                    include "cuti/tambah_cuti.php";
                                    break;
                                case 'edit-cuti':
                                    include "cuti/edit_cuti.php";
                                    break;
                                case 'hapus-cuti':
                                    include "cuti/hapus_cuti.php";
                                    break;

                                    //data-absensi
                                case 'data-absensi':
                                    include "absensi/data_absensi.php";
                                    break;
                                case 'tambah-absensi':
                                    include "absensi/tambah_absensi.php";
                                    break;
                                case 'edit-absensi':
                                    include "absensi/edit_absensi.php";
                                    break;
                                case 'hapus-absensi':
                                    include "absensi/hapus_absensi.php";
                                    break;
                                case 'scan-barcode':
                                    include "absensi/scan_barcode.php";
                                    break;

                                case 'ambil-barcode':
                                    include "absensi/ambil_barcode.php";
                                    break;

                                    //data-konsumsi
                                case 'data-konsumsi':
                                    include "konsumsi/data_konsumsi.php";
                                    break;
                                case 'tambah-konsumsi':
                                    include "konsumsi/tambah_konsumsi.php";
                                    break;
                                case 'edit-konsumsi':
                                    include "konsumsi/edit_konsumsi.php";
                                    break;
                                case 'hapus-konsumsi':
                                    include "konsumsi/hapus_konsumsi.php";
                                    break;

                                    //data-absensipulang
                                case 'data-absensipulang':
                                    include "absensipulang/data_absensipulang.php";
                                    break;
                                case 'tambah-absensipulang':
                                    include "absensipulang/tambah_absensipulang.php";
                                    break;
                                case 'edit-absensipulang':
                                    include "absensipulang/edit_absensipulang.php";
                                    break;
                                case 'hapus-absensipulang':
                                    include "absensipulang/hapus_absensipulang.php";
                                    break;

                                case 'scan-barcode-pulang':
                                    include "absensipulang/scan_barcode.php";
                                    break;

                                case 'ambil-barcode-pulang':
                                    include "absensipulang/ambil_barcode.php";
                                    break;





                                    //default
                                default:
                                    echo "<center><h1> ERROR !</h1></center>";
                                    break;
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
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="../plugins/select2/js/select2.full.min.js"></script>
        <!-- DataTables -->
        <script src="../plugins/datatables/jquery.dataTables.js"></script>
        <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>
        <!-- page script -->
        <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

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