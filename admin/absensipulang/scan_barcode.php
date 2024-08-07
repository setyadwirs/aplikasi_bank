<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code Absensi Pulang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
            margin: 40px auto;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px;
            background-color: paleturquoise;
        }

        .card-body {
            padding: 20px;
        }

        #previewKamera {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
            border: 1px solid #ccc;
            border-radius: 5px;
            transform: scaleX(-1);
        }

        #nik,
        #tanggal_pulang,
        #jam_pulang,
        #status_display {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 16px;
            border-radius: 5px;
        }

        #pilihKamera {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="my-4 text-center">Absensi Pulang</h1>
                <select id="pilihKamera"></select>
                <video id="previewKamera"></video>
                <br>
                <input type="text" id="nik" placeholder="Nik Karyawan" readonly>
                <input type="text" id="tanggal_pulang" placeholder="Tanggal Scan" readonly>
                <input type="text" id="jam_pulang" placeholder="Jam Scan" readonly>
                <input type="text" id="status_display" placeholder="Status" readonly>
                <!-- Tambahkan tombol Kembali -->
                <button id="btnKembali" class="btn btn-secondary mt-3">Kembali</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
    <script>
        let selectedDeviceId = null;
        const codeReader = new ZXing.BrowserMultiFormatReader();

        function initCameraSelection() {
            codeReader.listVideoInputDevices()
                .then(videoInputDevices => {
                    const sourceSelect = document.getElementById('pilihKamera');
                    selectedDeviceId = videoInputDevices[0].deviceId;

                    if (videoInputDevices.length >= 1) {
                        videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option');
                            sourceOption.text = element.label || `Camera ${sourceSelect.length + 1}`;
                            sourceOption.value = element.deviceId;
                            sourceSelect.appendChild(sourceOption);
                        });
                    }

                    sourceSelect.addEventListener('change', (event) => {
                        selectedDeviceId = event.target.value;
                        startScan(selectedDeviceId);
                    });

                    startScan(selectedDeviceId);
                })
                .catch(err => console.error(err));
        }

        function startScan(deviceId) {
            codeReader.decodeOnceFromVideoDevice(deviceId, 'previewKamera')
                .then(result => {
                    console.log(result);
                    const now = new Date();
                    const options = {
                        timeZone: 'Asia/Kuala_Lumpur',
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                        hour12: false
                    };
                    const formatter = new Intl.DateTimeFormat('en-GB', options);
                    const parts = formatter.formatToParts(now);
                    const tanggalPulang = `${parts[4].value}-${parts[2].value}-${parts[0].value}`;
                    const jamPulang = `${parts[6].value}:${parts[8].value}:${parts[10].value}`;

                    document.getElementById('nik').value = result.text;
                    document.getElementById('tanggal_pulang').value = tanggalPulang;
                    document.getElementById('jam_pulang').value = jamPulang;

                    // Kirim data menggunakan AJAX
                    sendToServer(result.text, tanggalPulang, jamPulang);
                })
                .catch(err => {
                    console.error(err);
                    document.getElementById('nik').value = 'QR Code tidak terdeteksi atau terjadi kesalahan.';
                    document.getElementById('tanggal_pulang').value = '';
                    document.getElementById('jam_pulang').value = '';
                    document.getElementById('status_display').value = 'Gagal';
                });
        }

        function sendToServer(nik, tanggalPulang, jamPulang) {
            let status = 'Hadir'; // Status default jika kurang dari jam 17:00:00
            const jamBatas = new Date();
            jamBatas.setHours(17, 0, 0, 0); // Jam 17:00:00

            const jamScan = new Date();
            const [hours, minutes, seconds] = jamPulang.split(':').map(Number);
            jamScan.setHours(hours, minutes, seconds, 0);

            if (jamScan > jamBatas) {
                status = 'Lembur'; // Jika jam pulang lebih dari jam 17:00:00
            }

            $.ajax({
                url: '../karyawan/absensipulang/koneksi_pulang.php', // Kirim ke halaman koneksi_pulang.php
                method: 'POST',
                data: {
                    nik: nik,
                    tanggal_pulang: tanggalPulang,
                    jam_pulang: jamPulang,
                    status: status // Gunakan status yang sudah ditentukan
                },
                success: function(response) {
                    console.log(response);
                    document.getElementById('status_display').value = status;
                    alert('Data absensi pulang berhasil disimpan.');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    document.getElementById('status_display').value = 'Gagal';
                    alert('Terjadi kesalahan saat menyimpan data absensi pulang.');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            if (!navigator.mediaDevices || !navigator.mediaDevices.enumerateDevices) {
                alert('Perangkat Anda tidak mendukung akses kamera.');
                return;
            }

            initCameraSelection();
        });

        // Tambahkan event listener untuk tombol Kembali
        document.getElementById('btnKembali').addEventListener('click', function() {
            window.history.back();
        });
    </script>
</body>

</html>