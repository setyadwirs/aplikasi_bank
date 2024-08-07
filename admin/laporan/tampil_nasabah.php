<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class=""></i> Data Nasabah
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="admin/nasabah/cetak_nasabah.php" target="_blank" class="btn btn-info">
                    <i class="fa fa-print"></i> Cetak Data Nasabah</a>
                </a>
            </div>
            <br>
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>NIK</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No.Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Nama Ibu</th>
                        <th>Pekerjaan</th>
                        <th>Pendapatan</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>File KTP</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM tb_nasabah");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?php echo $data['nama_nasabah']; ?></td>
                            <td><?php echo $data['nik']; ?></td>
                            <td><?php echo $data['ttl']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td><?php echo $data['no_telepon']; ?></td>
                            <td><?php echo $data['jenis_kelamin']; ?></td>
                            <td><?php echo $data['agama']; ?></td>
                            <td><?php echo $data['nama_ibu']; ?></td>
                            <td><?php echo $data['pekerjaan']; ?></td>
                            <td><?php echo $data['pendapatan']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td>
                                <img src="foto/<?php echo $data['foto']; ?>" alt="Foto" width="100">
                            </td>
                            <td>
                                <a href="foto/<?php echo $data['file_ktp']; ?>" target="_blank" class="btn btn-primary">Lihat File KTP</a>
                            </td>


                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <!-- Optional: Add any additional footer content if necessary -->
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>