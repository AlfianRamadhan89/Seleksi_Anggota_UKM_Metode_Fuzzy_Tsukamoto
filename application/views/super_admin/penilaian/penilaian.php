
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Penilaian Anggota Baru</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12 data-tables">
                        <div class="white-box" style="box-shadow: 1px 0px 4px 1px;">
                            <h3 class="box-title dataTable">Data Penilaian Anggota Baru</h3>
                            <button data-toggle="modal" data-target="#myModal" class="btn btn-md btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                            <!-- <a href="<?php echo base_url();?>ruangan/import" class="btn btn-sm btn-danger">Import</a> -->
                            <?php
                            if ($this->session->userdata('pesan') == true) {
                                if ($this->session->userdata('pesan') == 't') {
                                    $pesan = "Data Berhasil Ditambahkan";
                                    $warna = "alert-success";
                                    $this->session->set_userdata('pesan','');
                                } elseif ($this->session->userdata('pesan') == 'e') {
                                    $pesan = "Data Berhasil Diedit";
                                    $warna = "alert-success";
                                    $this->session->set_userdata('pesan','');
                                } elseif ($this->session->userdata('pesan') == 'h') {
                                    $pesan = "Data Berhasil Dihapus";
                                    $warna = "alert-success";
                                    $this->session->set_userdata('pesan','');
                                } elseif ($this->session->userdata('pesan') == 'a') {
                                    $pesan = "Maaf Data Anggota Baru Telah Dinilai! -> Silahkan Cek Ulang Kembali Data!";
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
                                            <th>Nama Calon Anggota</th>
                                            <th>Absensi</th>
                                            <th>Pembelajaran</th>
                                            <th>Kegiatan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($penilaian as $k) {
                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $k->stb; ?></td>
                                            <td><?= $k->nama; ?></td>
                                            <td><?= $k->absensi; ?></td>
                                            <td><?= $k->pembelajaran; ?></td>
                                            <td><?= $k->kegiatan; ?></td>
                                            <td>
                                            <a href="<?= base_url(); ?>Penilaian/hapus/<?= $k->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Data Akan diHapus?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <button class="btn btn-sm btn-warning view_detail" relid="<?= $k->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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
                    <h4 class="modal-title">Tambah Penilaian Anggota Baru</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url(); ?>Penilaian/tambah" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="nim">STB :</label>
                            <select class="form-control" id="nim" name="stb" required>
                                <option>-- Pilih Calon Anggota --</option>
                                <?php foreach($calon_anggota as $g){ ?>
                                <option value="<?= $g->stb; ?>" ><?= $g->stb . ' | ' . $g->nama; ?></option>
                                <?php }?>
                            </select>
                            <!-- <input type="text" class="form-control" id="nim" name="stb" required> -->
                        </div>
                        <div class="form-group">
                            <label for="ab">ABSENSI :</label>
                            <input type="number" class="form-control" id="ab" name="absen" min="0" max="15" required>
                        </div>
                        <div class="form-group">
                            <label for="pm">PEMBELAJARAN :</label>
                            <input type="number" class="form-control" id="pm" name="pembelajaran" min="0" max="100" required>
                        </div>
                        <div class="form-group">
                            <label for="kg">KEGIATAN :</label>
                            <input type="number" class="form-control" id="kg" name="kegiatan" min="0" max="5" required>
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
        
         <!-- Start Modal Edit -->
         <div class="modal" id="modal_edit">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Penilaian Anggota Baru</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url(); ?>Penilaian/edit" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="stb">STB :</label>
                            <!-- <select class="form-control" id="stb" name="stb" required>
                                <option>-- Pilih Calon Anggota --</option>
                                <?php foreach($calon_anggota as $g){ ?>
                                <option value="<?= $g->stb; ?>" ><?= $g->stb . ' | ' . $g->nama; ?></option>
                                <?php }?>
                            </select> -->
                            <input type="text" class="form-control" id="stb" name="stb" readonly>
                            <input type="hidden" class="form-control" id="id" name="id" required>
                        </div>
                        <div class="form-group">
                            <label for="as">ABSENSI :</label>
                            <input type="number" class="form-control" id="as" name="absen" min="0" max="15" required>
                        </div>
                        <div class="form-group">
                            <label for="pe">PEMBELAJARAN :</label>
                            <input type="number" class="form-control" id="pe" name="pembelajaran" min="0" max="100" required>
                        </div>
                        <div class="form-group">
                            <label for="ke">KEGIATAN :</label>
                            <input type="number" class="form-control" id="ke" name="kegiatan" min="0" max="5" required>
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
        <!-- End Modal Edit -->

<script type="text/javascript">
// load data for edit
    $(document).ready(function() {
        $('.view_detail').click(function() {
            var id = $(this).attr('relid'); //get the attribute value
            $.ajax({
                url : "<?= base_url(); ?>Penilaian/get_data_penilaian_edit",
                data:{id : id},
                method:'GET',
                dataType:'json',
                success:function(response) {
                $.each(response, function(i, item){
                    $('#id').val(response[i].id);
                    $('#stb').val(response[i].stb);
                    $('#as').val(response[i].absensi);
                    $('#pe').val(response[i].pembelajaran);
                    $('#ke').val(response[i].kegiatan);
                    $('#modal_edit').modal({backdrop: 'static', keyboard: true, show: true});
                });
                }
            });
        });
    });
</script>