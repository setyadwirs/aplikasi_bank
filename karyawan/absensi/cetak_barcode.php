<?php
// Make sure the path to autoload.php is correct
require '../../vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

// Konfigurasi koneksi ke database (ganti sesuai dengan konfigurasi Anda)
$host = 'localhost';
$dbname = 'aplikasi_bank';
$username = 'root';
$password = '';

$nik = '';
$qrCodeImage = '';
$message = '';

try {
    // Koneksi ke database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk mengambil NIK karyawan dari tabel tb_karyawan
    $stmt = $pdo->query('SELECT nik FROM tb_karyawan LIMIT 1');
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $nik = $row['nik'];
        $qrCode = new QrCode($nik);

        // Buat gambar QR Code
        $writer = new PngWriter();
        $qrCodeImage = $writer->write($qrCode)->getDataUri();
    } else {
        $message = "Data karyawan tidak ditemukan.";
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fungsi untuk membuat PDF dengan QR Code
function generatePDF($nik, $qrCodeImage)
{
    // Instansiasi objek FPDF
    $pdf = new \FPDF(); // Use \FPDF here to avoid namespace conflict

    $pdf->AddPage();

    // Atur font dan ukuran teks
    $pdf->SetFont('Arial', 'B', 16);

    // Judul
    $pdf->Cell(0, 10, 'QR Code untuk NIK Karyawan: ' . $nik, 0, 1, 'C');
    $pdf->Ln(10);

    // Tambahkan gambar QR Code
    $pdf->Image($qrCodeImage, 50, 50, 100, 100);

    // Simpan dan tampilkan file PDF
    $pdf->Output('D', 'QR_Code_' . $nik . '.pdf'); // D untuk download, bisa diganti menjadi I untuk tampilan di browser
}

// Cek jika tombol download PDF ditekan
if (isset($_GET['download']) && $_GET['download'] === 'pdf') {
    generatePDF($nik, $qrCodeImage);
    exit;
}
?>

<script type="text/javascript">
    window.print();
</script>

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
        <h1 class="my-4 text-center">Barcode Absensi</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php if ($nik) : ?>
                            <h5 class="card-title">NIK Karyawan: <?= htmlspecialchars($nik) ?></h5>
                            <img src="<?= $qrCodeImage ?>" alt="QR Code" class="qr-code-img">
                            
                            <br><br>
                            <!-- Tambahkan href yang memanggil generatePDF saat diklik -->
                            <!-- <a href="?download=pdf" class="btn btn-primary">Download QR Code as PDF</a> -->
                        <?php else : ?>
                            <p class="card-text"><?= isset($message) ? htmlspecialchars($message) : "Data karyawan tidak ditemukan." ?></p>
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