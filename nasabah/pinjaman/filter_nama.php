<?php include "../../inc/koneksi.php";

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $id_karyawan = isset($_GET['id_karyawan']) ? $_GET['id_karyawan'] : '';

    $where_condition = '';
    if (!empty($id_karyawan)) {
        $where_condition = " AND tb_konsumsi.id_karyawan = $id_karyawan";
    }

    $select_sql = mysqli_query($koneksi, "SELECT * FROM tb_konsumsi JOIN tb_karyawan ON tb_konsumsi.id_karyawan = tb_karyawan.id_karyawan
                                          WHERE tb_konsumsi.tanggal BETWEEN '$start_date' AND '$end_date' $where_condition");
} else {
    $select_sql = mysqli_query($koneksi, "SELECT * FROM tb_konsumsi JOIN tb_karyawan ON tb_konsumsi.id_karyawan = tb_karyawan.id_karyawan");
}

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

    <p align=""><b>
            <center>
                <font size="5">BANK KALSEL KCPS Q-Mall</font> <br>
                <font size="2">Alamat: Jalan A.Yani KM.36,8, Komet</font><br>
                <font size="2">Kec. Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan 70714</font><br>
                <hr size="2px" color="black">
            </center>
        </b></p>

    <h3>
        <center>
            <h3 align="center" style="font-size: 16px;"><u>LAPORAN DATA KONSUMSI</u></h3>
        </center>
    </h3>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr style="background-color: darkgrey" height="30px">
                            <th style="text-align: center; font-size: 18px;">No</th>
                            <th style="text-align: center; font-size: 18px;">Nama Karyawan</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal</th>
                            <th style="text-align: center; font-size: 18px;">Dana Konsumsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        while ($data = mysqli_fetch_array($select_sql, MYSQLI_BOTH)) {
                            $totalDanaKonsumsi += $data['dana_konsumsi'];
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><?php echo $data['nama_karyawan']; ?></td>
                                <td align="center"><?php echo $data['tanggal']; ?></td>
                                <td align="center">Rp.<?php echo number_format($data['dana_konsumsi'], 0, ',', '.'); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" align="center"><b>Total Dana Konsumsi</b></td>
                            <td align="center"><b>Rp.<?php echo number_format($totalDanaKonsumsi, 0, ',', '.'); ?></b></td>
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

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

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
