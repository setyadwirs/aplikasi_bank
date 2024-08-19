<?php

$nik = $_SESSION['nik']; // Ambil NIK dari session
// Ambil data pengajuan yang disetujui
$query = "SELECT * FROM tb_pinjaman  WHERE nik = '$nik'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $notifications = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $notifications[] = $row;
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f2f5;
        }

        .container {
            margin-top: 30px;
        }

        .notification {
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #007bff;
        }

        .notification-title {
            font-size: 1.25rem;
            color: #333;
            margin-bottom: 10px;
        }

        .notification-body {
            font-size: 1rem;
            color: #555;
        }

        .notification-footer {
            margin-top: 10px;
            font-size: 0.875rem;
            color: #777;
        }

        .notification-actions {
            margin-top: 10px;
        }

        .btn {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Dashboard</h1>

        <?php if (!empty($notifications)) : ?>
            <div class="notifications">
                <?php foreach ($notifications as $notification) : ?>
                    <div class="notification">
                        <p class="notification-title">Pengajuan ID: <?php echo htmlspecialchars($notification['id_pinjaman']); ?></p>
                        
                        <p class="notification-body">Tanggal Survei: <?php echo htmlspecialchars($notification['tanggal_survei']); ?></p>
                        <p class="notification-body">Status Survei: <?php echo htmlspecialchars($notification['status_survei']); ?></p>

                        
                        <p class="notification-body">Status Pengajuan: <?php echo htmlspecialchars($notification['status_pengajuan']); ?></p>

                        <p class="notification-body">Komentar : <?php echo htmlspecialchars($notification['alasan_status']); ?></p>
                        <p class="notification-body">Tanggal Pengajuan: <?php echo htmlspecialchars($notification['tanggal_pengajuan']); ?></p>
                        <div class="notification-footer">
                            <small>Ditampilkan pada <?php echo date('d M Y H:i:s'); ?></small>
                        </div>
                        <div class="notification-actions">
                            <a href="?page=data-pinjaman" class="btn btn-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="alert alert-info">Belum ada pengajuan yang disetujui.</div>
        <?php endif; ?>
    </div>

    <script src="path/to/bootstrap.bundle.min.js"></script>
</body>

</html>