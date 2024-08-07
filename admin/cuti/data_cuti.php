<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class=""></i> Data Cuti
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <br>
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>NIK</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Sampai</th>
                        <th>Alasan Cuti</th>
                        <th>Surat Cuti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM tb_cuti tb_cuti JOIN tb_karyawan ON tb_cuti.nik = tb_karyawan.nik 
                    ");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?php echo htmlspecialchars($data['nama_karyawan']); ?></td>
                            <td><?php echo htmlspecialchars($data['nik']); ?></td>
                            <td><?php echo htmlspecialchars($data['tanggal_mulai']); ?></td>
                            <td><?php echo htmlspecialchars($data['tanggal_sampai']); ?></td>
                            <td><?php echo htmlspecialchars($data['alasan_cuti']); ?></td>
                            <td>
                                <a class="btn btn-success" href="./foto/<?php echo htmlspecialchars($data['foto']); ?>" target="_blank">
                                    Lihat file
                                </a>
                            </td>
                            <td><?php echo htmlspecialchars($data['status']); ?></td>
                            <td>
                                <?php
                                if ($data['status'] == 'Diajukan') {
                                    echo '<a href="#" data-toggle="modal" data-target="#modal-setuju-' . $data['id_cuti'] . '" title="Setujui" class="btn btn-primary btn-sm">
                                            <b class="text-dark">Setuju</b>
                                          </a> | ';
                                    echo '<a href="#" data-toggle="modal" data-target="#modal-tolak-' . $data['id_cuti'] . '" title="Tolak" class="btn btn-warning btn-sm">
                                            <b class="text-dark">Tidak Setuju</b>
                                          </a>';
                                }
                                ?>
                                <a href="?page=hapus-cuti&kode=<?php echo $data['id_cuti']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <b class="fa fa-trash"></b>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Setuju -->
                        <div class="modal fade" id="modal-setuju-<?php echo $data['id_cuti']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Setujui Cuti</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="?page=setuju">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_cuti" value="<?php echo $data['id_cuti']; ?>">
                                            <div class="form-group">
                                                <label for="alasan">Alasan</label>
                                                <textarea class="form-control" id="alasan_status" name="alasan_status" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Setujui</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Tolak -->
                        <div class="modal fade" id="modal-tolak-<?php echo $data['id_cuti']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Tolak Cuti</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="?page=tolak">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_cuti" value="<?php echo $data['id_cuti']; ?>">
                                            <div class="form-group">
                                                <label for="alasan">Alasan</label>
                                                <textarea class="form-control" id="alasan_status" name="alasan_status" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Tolak</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>