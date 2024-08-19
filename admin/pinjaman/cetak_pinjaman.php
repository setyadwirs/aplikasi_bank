<?php
include "../../inc/koneksi.php";

$sql = "SELECT * FROM tb_pinjaman";
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
    <img src="../../dist/img/logo.png" align="left" width="120px">
    <p align="center"><b>
            <font size="5">BANK KALSEL KCPS Q-Mall</font> <br>
            <font size="2">Alamat: Jalan A.Yani KM.36,8, Komet</font><br>
            <font size="2">Kec. Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan 70714</font><br>
            <hr size="2px" color="black">
        </b></p>

    <h3 align="center">LAPORAN DATA PINJAMAN</h3>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr style="background-color: darkgrey" height="30px">
                            <th style="text-align: center; font-size: 18px;">No</th>
                            <th style="text-align: center; font-size: 18px;">Nama Pinjaman</th>
                            <th style="text-align: center; font-size: 18px;">NIK</th>
                            <th style="text-align: center; font-size: 18px;">Email</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal Pengajuan</th>
                            <th style="text-align: center; font-size: 18px;">Jumlah Pinjaman</th>
                            <th style="text-align: center; font-size: 18px;">Keperluan</th>
                            <th style="text-align: center; font-size: 18px;">Status Survei</th>
                            <th style="text-align: center; font-size: 18px;">Status Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_nasabah']; ?></td>
                                <td><?php echo $data['nik']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['tanggal_pengajuan']; ?></td>
                                <td><?php echo number_format($data['jumlah_pinjaman'], 0, ',', '.'); ?></td>
                                <td><?php echo $data['keperluan']; ?></td>
                                <td><?php echo $data['status_survei']; ?></td>
                                <td>
                                    <?php
                                    $status = $data['status_pengajuan'];
                                    switch ($status) {
                                        case 'Diajukan':
                                            echo '<button class="btn btn-primary btn-sm" disabled>' . $status . '</button>';
                                            break;
                                        case 'Disetujui':
                                            echo '<button class="btn btn-success btn-sm" disabled>' . $status . '</button>';
                                            break;
                                        case 'Ditolak':
                                            echo '<button class="btn btn-danger btn-sm" disabled>' . $status . '</button>';
                                            break;
                                        default:
                                            echo '<button class="btn btn-secondary btn-sm" disabled>' . $status . '</button>';
                                            break;
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                       
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
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
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