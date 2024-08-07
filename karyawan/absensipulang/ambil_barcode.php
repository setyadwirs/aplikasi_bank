<?php
require '../vendor/autoload.php'; // Memuat Composer autoload

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

// Konfigurasi koneksi ke database (ganti sesuai dengan konfigurasi Anda)
$host = 'localhost';
$dbname = 'aplikasi_bank';
$username = 'root';
$password = '';

$nik = isset($_SESSION['nik']) ? $_SESSION['nik'] : '';
$qrCodeImage = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nik'])) {
    // Validasi input NIK
    $nik = htmlspecialchars($_POST['nik']);

    try {
        // Koneksi ke database
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query untuk mengambil NIK dari tabel tb_karyawan berdasarkan input NIK
        $stmt = $pdo->prepare('SELECT nik FROM tb_karyawan WHERE nik = :nik');
        $stmt->execute(['nik' => $nik]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $qrCode = new QrCode($nik);

            // Buat gambar QR Code
            $writer = new PngWriter();
            $qrCodeImage = $writer->write($qrCode)->getDataUri();
        } else {
            $message = "Data karyawan dengan NIK $nik tidak ditemukan.";
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Generate QR Code dari Database</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .qr-code-img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4 text-center">Barcode Absensi Pulang</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nik">Masukkan NIK Karyawan:</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="<?= htmlspecialchars($nik) ?>" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Generate QR Code</button>
                            <button type="reset" class="btn btn-secondary">Reset</button> <!-- Tombol Reset -->
                        </form>
                        <hr>
                        <?php if ($qrCodeImage) : ?>
                            <h5 class="card-title mr-7">NIK Karyawan: <?= htmlspecialchars($nik) ?></h5>
                            <img src="<?= $qrCodeImage ?>" alt="QR Code" class="qr-code-img">
                        <?php elseif ($message) : ?>
                            <p class="card-text"><?= htmlspecialchars($message) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>