<?php
include "../../inc/koneksi.php";
$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : null;
?>

<!DOCTYPE html>
<html>

<head>
  <title>BANK KALSEL</title>
  <link rel="shortcut icon" href="../../dist/img/logo.png">
  <style type="text/css">
    @media print {
      @page {
        size: landscape
      }
    }
  </style>
</head>

<body>
  <?php
  function rupiah($angka)
  {
    $hasil_rupiah = "Rp " . number_format($angka, 0, ",", ".");
    return $hasil_rupiah;
  }
  ?>

  <?php
  function tgl_indo($tanggal)
  {
    $bulan = array(
      1 => "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember"
    );
    $pecahkan = explode("-", $tanggal);

    return $pecahkan[2] . " " . $bulan[(int) $pecahkan[1]] . " " . $pecahkan[0];
  }
  ?>

  <table border="0" align="center" width="100%">
    <tr align="center">
      <td>
        <img src="../../dist/img/logo.png" align="left" width="120px">
      </td>
      <td>
        <font style="margin-right: 120px;" size="5">BANK KALSEL KCPS Q-Mall</font> <br>
        <font style="margin-right: 120px;" size="4">Alamat: Jalan A.Yani KM.36,8, Komet</font><br>
        <font style="margin-right: 120px;" size="4">Kec. Banjarbaru Utara, Kota Banjarbaru, Kalimantan Selatan 70714</font><br>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <hr size="3px" color="black">
      </td>
    </tr>
  </table>

  <h3 align="center" style="font-size: 16px;">
    <u>LAPORAN GRAFIK KARYAWAN CUTI MASUK PERIODE <?php echo strtoupper($bulan ? date('F', mktime(0, 0, 0, $bulan, 1)) : 'SEMUA BULAN'); ?></u> <br>
  </h3>
  <br>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

  <canvas id="myChart" style="width:100%; height: 600px;"></canvas>

  <BR><BR>

  <?php
  $stt = "";
  ?>

  <script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?php for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, $bulan, date('Y')); $i++) { ?> "<?php echo $i; ?>", <?php } ?>],
        datasets: [{
          label: 'Jumlah Karyawan Cuti',
          backgroundColor: 'rgba(<?php echo rand(0, 255) ?>,<?php echo rand(0, 255) ?>, 245)',
          borderColor: 'rgba(<?php echo rand(0, 255) ?>,<?php echo rand(0, 255) ?>, 245)',
          data: [<?php for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, $bulan, date('Y')); $i++) {
                    $filterBulan = $bulan ? " AND DAY(tb_cuti.tanggal_mulai)='$i'" : "";
                    $jumlah_karyawan_cuti = mysqli_query($koneksi, "SELECT * FROM tb_cuti WHERE 1=1$filterBulan");
                    $nums = mysqli_num_rows($jumlah_karyawan_cuti);
                    $stt .= $nums . ",";
                  }
                  echo rtrim($stt, ',');
                  ?>],
        }]
      },
    });

    // Tambahkan script ini untuk mengecek apakah ada kesalahan saat membuat chart
    if (chart.config.data.labels.length === 0) {
      console.error("Tidak ada data yang ditemukan. Pastikan data tersedia di database.");
    }
  </script>

  <script type="text/javascript">
    var delayInMilliseconds = 1000;

    setTimeout(function() {
      window.print()
    }, delayInMilliseconds);
  </script>
</body>

</html>
