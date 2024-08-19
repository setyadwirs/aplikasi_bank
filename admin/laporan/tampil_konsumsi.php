<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class=""></i> Laporan Konsumsi Karyawan
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <br>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" role="tab" aria-selected="true">Periode Masuk Pertanggal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" role="tab" aria-selected="false"> Seluruh</a>
                    </li>
                </ul>
                <div class="tab-content px-1 pt-1">
                    <div class="tab-pane active" id="tab11" role="tabpanel" aria-labelledby="base-tab11"><br>
                        <div class="row">
                            <div class="col-md-3">
                                DARI TANGGAL
                            </div>
                            <div class="col-md-3">
                                SAMPAI TANGGAL
                            </div>
                            <div class="col-md-3">
                                NAMA KARYAWAN
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 text-right">
                                <form method="GET" target="_blank" action="admin/konsumsi/cetak_filter.php">
                                    <input class="form-control" type="date" name="start_date" id="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>">
                            </div>
                            <div class="col-md-3 text-right">
                                <input class="form-control" type="date" name="end_date" id="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>">
                            </div>
                            <div class="col-md-3 text-right">
                                <select class="form-control" name="nik">
                                    <option value="">-- Pilih Nama Karyawan --</option>
                                    <?php
                                    include "inc/koneksi.php";
                                    $query_karyawan = mysqli_query($koneksi, "SELECT * FROM tb_karyawan") or die(mysqli_error($koneksi));
                                    while ($data_karyawan = mysqli_fetch_array($query_karyawan)) {
                                    ?>
                                        <option value="<?php echo $data_karyawan['nik']; ?>"><?php echo $data_karyawan['nama_karyawan']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-info" type="submit" name="filter">Cetak Filter</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab12" role="tabpanel" aria-labelledby="base-tab12"><br>
                        <div class="row">
                            <a href="admin/konsumsi/cetak_konsumsi.php" target="_blank" class="btn btn-info">
                                <i class="fa fa-print"></i> Cetak Semua</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <br>
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal</th>
                                <th>Dana Konsumsi</th>
                                <th>Status</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            // Pastikan query SQL sesuai dengan nama tabel dan kolom yang ada
                            $sql = $koneksi->query("SELECT tb_konsumsi.*, tb_karyawan.nama_karyawan FROM tb_konsumsi JOIN tb_karyawan ON tb_konsumsi.nik = tb_karyawan.nik");

                            while ($data = $sql->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($data['nik']); ?></td>
                                    <td><?= htmlspecialchars($data['nama_karyawan']); ?></td>
                                    <td><?= htmlspecialchars($data['tanggal_pulang']); ?></td>
                                    <td>Rp. <?= number_format($data['dana_konsumsi'], 0, ',', '.'); ?></td>
                                    <td><?= htmlspecialchars($data['status']); ?></td>
                                    <!-- <td>
                                <a href="?page=edit-konsumsi&kode=<?= $data['id_konsumsi']; ?>" title="Ubah" class="btn btn-warning btn-sm">
                                    <b class="fa fa-edit"></b>
                                </a>
                                <a href="?page=hapus-konsumsi&kode=<?= $data['id_konsumsi']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <b class="fa fa-trash"></b>
                                </a>
                            </td> -->
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <!-- Jika Anda ingin menambahkan footer tabel -->
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>


