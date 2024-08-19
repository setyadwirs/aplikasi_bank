<?php
include "../../inc/koneksi.php";

// Mengambil parameter filter dari URL
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$nama_karyawan = isset($_GET['nama_karyawan']) ? $_GET['nama_karyawan'] : '';

// Query SQL dengan filter
$sql = "SELECT * FROM tb_absensi 
        JOIN tb_karyawan ON tb_absensi.nik = tb_karyawan.nik 
        WHERE 1=1";

if ($start_date && $end_date) {
    $sql .= " AND tanggal_masuk BETWEEN '$start_date' AND '$end_date'";
}

if ($status) {
    $sql .= " AND status = '$status'";
}

if ($nama_karyawan) {
    $sql .= " AND nama_karyawan = '$nama_karyawan'";
}

$sql .= " ORDER BY tanggal_masuk ASC";

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

?>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Absensi - BANK KALSEL</title>
    <link rel="shortcut icon" href="../../dist/img/logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: darkgrey;
        }
    </style>
</head>

<body>
    <img src="../../dist/img/logo.png" align="left" width="120px">

    <p align="center"><b>
            <font size="5">BANK KALSEL KCPS Q-Mall</font> <br>
            <font size="2">Alamat: Jalan A.Yani KM.36,8, Komet</font><br>
            <font size="2">Kec. Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan 70714</font><br>
            <hr size="2px" color="black">
        </b></p>

    <h3>
        <center>LAPORAN DATA ABSENSI DATANG<br>
            <small style="font-size: 12px;"><?php echo ($start_date && $end_date) ? tgl_indo($start_date) . ' s/d ' . tgl_indo($end_date) : 'Semua Tanggal'; ?></small>
        </center>
    </h3>

    <div>
        <table>
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
                $no = 1;
                while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nik']; ?></td>
                        <td><?php echo $data['nama_karyawan']; ?></td>
                        <td><?php echo $data['jam_masuk']; ?></td>
                        <td><?php echo $data['tanggal_masuk']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
    <div style="text-align: right; margin-right: 50px; font-size: 11pt;">
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