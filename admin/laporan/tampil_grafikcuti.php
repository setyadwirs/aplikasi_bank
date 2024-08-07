<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class=""></i> Grafik Karyawan Cuti
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
                        <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" role="tab" aria-selected="true">Periode Pertahun dan Perbulan</a>
                    </li>
                </ul>
                <div class="tab-content px-1 pt-1">
                    <div class="tab-pane active" id="tab11" role="tabpanel" aria-labelledby="base-tab11"><br>
                        <div class="row">
                            <div class="col-md-3">
                                TAHUN
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 text-right">
                                <form method="GET" action="admin/cuti/cetak_grafik.php">
                                    <select class="form-control" name="tahun" required>
                                        <option value="">--Pilih Tahun--</option>
                                        <?php
                                        $thn = 2025;
                                        for ($i = 0; $i < 20; $i++) {
                                        ?>
                                            <option><?php echo $thn; ?></option>
                                        <?php
                                            $thn = $thn - 1;
                                        }
                                        ?>
                                    </select>
                            </div>

                            <div class="col-2">
                                <button class="btn btn-info" type="submit" name="filter">Cetak Grafik</button>
                            </div>
                            </form>
                        </div>

                        <!-- Tambahkan filter perbulan di sini -->
                        <div class="row mt-3">
                            <div class="col-md-3">
                                BULAN
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 text-right">
                                <form method="GET" action="admin/cuti/cetak_bulan.php">
                                    <select class="form-control" name="bulan" required>
                                        <option value="">--Pilih Bulan--</option>
                                        <?php
                                        $bulanList = [
                                            1 => 'Januari',
                                            2 => 'Februari',
                                            3 => 'Maret',
                                            4 => 'April',
                                            5 => 'Mei',
                                            6 => 'Juni',
                                            7 => 'Juli',
                                            8 => 'Agustus',
                                            9 => 'September',
                                            10 => 'Oktober',
                                            11 => 'November',
                                            12 => 'Desember',
                                        ];
                                        foreach ($bulanList as $bulanKey => $bulanName) {
                                        ?>
                                            <option value="<?php echo $bulanKey; ?>"><?php echo $bulanName; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                            </div>

                            <div class="col-2">
                                <button class="btn btn-info" type="submit" name="filter">Cetak Grafik</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.card-body -->
</div>
