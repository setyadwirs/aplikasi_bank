<?php include "../../inc/koneksi.php";

$sql = "SELECT tb_konsumsi.*, tb_karyawan.nama_karyawan FROM tb_konsumsi JOIN tb_karyawan ON tb_konsumsi.nik = tb_karyawan.nik";
$query = mysqli_query($koneksi, $sql);

$bln = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);

$totalDanaKonsumsi = 0; // Inisialisasi variabel total dana konsumsi

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
    <!-- <img src="../../dist/img/logo.png" align="right" width="70"> -->
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
            LAPORAN DATA KONSUMSI<br>
            <!-- <small style="font-size: 12px;"><?php echo $mulaitgl . ' s/d ' . $akhirtgl; ?></small> -->
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr style="background-color: darkgrey" height="30px">

                            <th style="text-align: center; font-size: 18px;">No </th>
                            <th style="text-align: center; font-size: 18px;">Nik </th>
                            <th style="text-align: center; font-size: 18px;">Nama Karyawan </th>
                            <th style="text-align: center; font-size: 18px;">Tanggal</th>
                            <th style="text-align: center; font-size: 18px;">Dana Konsumsi</th>
                            <th style="text-align: center; font-size: 18px;">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                            $totalDanaKonsumsi += 15000; // Tetapkan nilai total dana konsumsi sesuai dengan jumlah yang diinginkan
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++  ?></td>
                                <td align="center"><?php echo $data['nik']; ?></td>
                                <td align="center"><?php echo $data['nama_karyawan']; ?></td>
                                <td align="center"><?php echo $data['tanggal_pulang']; ?></td>
                                <td align="center">Rp.<?php echo str_pad(number_format(15000, 0, ',', '.'), 0, '0', STR_PAD_LEFT); ?></td>
                                <td align="center"><?php echo $data['status']; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" align="center"><b>Total Dana Konsumsi</b></td>
                            <td align="center"><b>Rp.<?php echo str_pad(number_format($totalDanaKonsumsi, 0, ',', '.'), 0, '0', STR_PAD_LEFT); ?></b></td>
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
            1 =>   'Januari',
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

    // echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017

    // echo "<br/>";
    // echo "<br/>";

    // echo tgl_indo("1994-02-15"); // 15 Februari 1994
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