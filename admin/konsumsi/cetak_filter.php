<?php
include "../../inc/koneksi.php";

// Ambil parameter dari URL jika ada
$start_date = isset($_GET['start_date']) ? mysqli_real_escape_string($koneksi, $_GET['start_date']) : '';
$end_date = isset($_GET['end_date']) ? mysqli_real_escape_string($koneksi, $_GET['end_date']) : '';
$nik = isset($_GET['nik']) ? mysqli_real_escape_string($koneksi, $_GET['nik']) : '';

// Query SQL untuk memfilter data
$query = "SELECT tb_konsumsi.*, tb_karyawan.nama_karyawan 
          FROM tb_konsumsi 
          JOIN tb_karyawan ON tb_konsumsi.nik = tb_karyawan.nik
          WHERE 1=1";

if ($start_date && $end_date) {
    $query .= " AND tb_konsumsi.tanggal_pulang BETWEEN '$start_date' AND '$end_date'";
}

if ($nik) {
    $query .= " AND tb_konsumsi.nik = '$nik'";
}

$select_sql = mysqli_query($koneksi, $query);

$totalDanaKonsumsi = 0;
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>BANK KALSEL</title>
    <link rel="shortcut icon" href="../../dist/img/logo.png">
</head>

<body>
    <img src="../../dist/img/logo.png" align="left" width="120px">

    <p align="">
        <b>
            <center>
                <font size="5">BANK KALSEL KCPS Q-Mall</font> <br>
                <font size="2">Alamat: Jalan A.Yani KM.36,8, Komet</font><br>
                <font size="2">Kec. Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan 70714</font><br>
                <hr size="2px" color="black">
            </center>
        </b>
    </p>

    <h3>
        <center>
            <h3 align="center" style="font-size: 16px;">
                <u>LAPORAN DATA KONSUMSI <br> <?php echo strtoupper(tgl_indo($start_date)); ?> SAMPAI DENGAN <?php echo strtoupper(tgl_indo($end_date)); ?></u> <br>
            </h3>
        </center>
    </h3>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr style="background-color: darkgrey" height="30px">
                            <th style="text-align: center; font-size: 18px;">No</th>
                            <th style="text-align: center; font-size: 18px;">Nik</th>
                            <th style="text-align: center; font-size: 18px;">Nama Karyawan</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal</th>
                            <th style="text-align: center; font-size: 18px;">Dana Konsumsi</th>
                            <th style="text-align: center; font-size: 18px;">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        while ($data = mysqli_fetch_array($select_sql, MYSQLI_BOTH)) {
                            $danaKonsumsi = 15000; // Tetapkan nilai dana konsumsi yang sesuai
                            $totalDanaKonsumsi += $danaKonsumsi; // Tambahkan dana konsumsi ke total
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><?php echo $data['nik']; ?></td>
                                <td align="center"><?php echo $data['nama_karyawan']; ?></td>
                                <td align="center"><?php echo tgl_indo($data['tanggal_pulang']); ?></td>
                                <td align="center">Rp.<?php echo number_format($danaKonsumsi, 0, ',', '.'); ?></td>
                                <td align="center"><?php echo $data['status']; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4" align="center"><b>Total Dana Konsumsi</b></td>
                            <td align="center"><b>Rp.<?php echo number_format($totalDanaKonsumsi, 0, ',', '.'); ?></b></td>
                            <td></td> <!-- Kosongkan kolom status -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>
    <br>
    <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>
            Banjarmasin, <?= tgl_indo(date('Y-m-d')) ?>
            <p style="text-align: center;">
                <b>Kepala Bagian Pengelolaan<br>Bank Kalsel Kcps Q-Mall</b><br>
            </p>
            <br><br><br>
        </label>
    </div>
</body>

</html>