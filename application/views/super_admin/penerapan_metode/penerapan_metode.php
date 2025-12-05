
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Penerapan Metode Fuzzy Tsukamoto</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12 data-tables">
                        <div class="white-box" style="box-shadow: 1px 0px 4px 1px;">
                            <h3 class="box-title dataTable">Data Penerapan Metode</h3>
                            <button data-toggle="modal" data-target="#myModal" class="btn btn-md btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                            <a href="<?= base_url(); ?>Penerapan_metode/grafik" class="btn btn-md btn-warning"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                            <!-- <a href="<?php echo base_url();?>ruangan/import" class="btn btn-sm btn-danger">Import</a> -->
                            <?php
                            if ($this->session->userdata('pesan') == true) {
                                if ($this->session->userdata('pesan') == 't') {
                                    $pesan = "Data Berhasil Ditambahkan";
                                    $warna = "alert-success";
                                    $this->session->set_userdata('pesan','');
                                } elseif ($this->session->userdata('pesan') == 'e') {
                                    $pesan = "Perhitungan Metode Berhasil Dilakukan";
                                    $warna = "alert-success";
                                    $this->session->set_userdata('pesan','');
                                } elseif ($this->session->userdata('pesan') == 'h') {
                                    $pesan = "Data Berhasil Dihapus";
                                    $warna = "alert-success";
                                    $this->session->set_userdata('pesan','');
                                } elseif ($this->session->userdata('pesan') == 'a') {
                                    $pesan = "Maaf Penerapan Metode Telah Dilakukan Untuk Data Anggota Baru Tersebut! -> Silahkan Cek Ulang Kembali Data!";
                                    $warna = "alert-danger";
                                    $this->session->set_userdata('pesan','');
                                } elseif ($this->session->userdata('pesan') == 'n') {
                                    $pesan = "Maaf Anggota Baru Belum Dinilai -> Silahkan Cek Ulang Kembali Penilaian Anggota Baru!";
                                    $warna = "alert-danger";
                                    $this->session->set_userdata('pesan','');
                                } elseif ($this->session->userdata('pesan') == 'x') {
                                    $pesan = "Maaf Penilaian Anggota Baru Melebihi Dari Batas Penilaian Yang Yelah Ditentukan -> Silahkan Cek Ulang Kembali Penilaian Anggota Baru!";
                                    $warna = "alert-danger";
                                    $this->session->set_userdata('pesan','');
                                }
                            ?>
                            <br>
                            <div class="alert <?= $warna; ?> alert-dismissible" style="margin-top:10px;">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?= $pesan; ?>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="table-responsive" style="padding-top:20px;">
                                <table class="table" id="datatables8">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>STB</th>
                                            <th>Nama Anggota Baru</th>
                                            <th>Himpunan Fuzzy Lulus</th>
                                            <th>Himpunan Fuzzy Tidak Lulus</th>
                                            <th>Probilitas</th>
                                            <th>Predikat</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($penerapan as $p) {
                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $p->stb; ?></td>
                                            <td><?= $p->nama; ?></td>
                                            <td><?= $p->kep_lulus; ?></td>
                                            <td><?= $p->kep_tdklulus; ?></td>
                                            <td><?= $p->n_rekomendasi; ?></td>
                                            <td><?= $p->predikat; ?></td>
                                            <td>
                                            <a href="<?= base_url(); ?>Tsukamoto/proses/<?= $p->stb; ?>" class="btn btn-sm btn-success" onclick="return confirm('Yakin Data Akan diProses?')"><i class="fa fa-hourglass"></i></a>
                                            <!-- <button class="btn btn-sm btn-success view_detail" relid="<?= $p->stb; ?>"><i class="fa fa-hourglass" aria-hidden="true"></i></button> -->
                                            <a href="<?= base_url(); ?>Penerapan_metode/hapus/<?= $p->id_penerapan; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Data Akan diHapus?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2023 &copy; NIPHAZ DIPLOMA CLUB UNIVERSITAS DIPA MAKASSAR </footer>
        </div>

        <!-- Start Modal Tambah -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Penerapan Metode Untuk Anggota Baru</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url();?>Penerapan_metode/tambah" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nim">STB :</label>
                            <select class="form-control" id="nim" name="stb" required>
                                <option>-- Pilih STB Calon Anggota Baru --</option>
                                <?php foreach($calon_anggota as $p){ ?>
                                <option value="<?= $p->stb; ?>" ><?= $p->stb . ' | ' . $p->nama; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- End Modal Tambah -->
