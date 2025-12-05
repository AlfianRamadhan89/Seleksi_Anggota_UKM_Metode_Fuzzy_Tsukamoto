
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Derajat Himpunan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12 data-tables">
                        <div class="white-box" style="box-shadow: 1px 0px 4px 1px;">
                            <h3 class="box-title dataTable">Data Derajat Himpunan</h3>
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
                                            <!-- <th>No</th> -->
                                            <th>Kode Derajat</th>
                                            <th>Nama Derajat</th>
                                            <th>Grafik</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($derajat as $k) {
                                        ?>
                                        <tr>
                                            <!-- <td><?= $no; ?></td> -->
                                            <td><?= $k->kd_derajat; ?></td>
                                            <td><?= $k->nm_derajat; ?></td>
                                            <td><img src='<?= base_url(); ?>assets/plugins/images/derajat_himpunan/<?= $k->grafik; ?>' width='280' height='195'></td>
                                            <td>
                                            <button class="btn btn-sm btn-info view_detail" relid="<?= $k->kd_derajat; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                                            <a href="<?= base_url(); ?>Derajat_himpunan/hapus/<?= $k->kd_derajat; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Data Akan diHapus?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <button data-toggle="modal" data-target="#edit<?= $k->kd_derajat; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                        <?php //$no++; 
                                        } ?>
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
                    <h4 class="modal-title">Tambah Derajat Himpunan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url(); ?>Derajat_himpunan/tambah" method="post" enctype="multipart/form-data">
                <!-- Modal body -->
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="nama1">Nama Derajat Himpunan :</label>
                            <input type="text" class="form-control" id="nama1" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="grafik1">Foto Grafik :</label>
                            <input type="file" class="form-control" id="grafik1" name="foto" required>
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
        <?php
        $no = 1;
        foreach ($derajat as $a) {
        ?>
         <div class="modal" id="edit<?= $a->kd_derajat; ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Derajat Himpunan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url(); ?>Derajat_himpunan/edit" method="post" enctype="multipart/form-data">
                <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Derajat Himpunan :</label>
                            <input type="text" class="form-control" id="nama" value="<?= $a->nm_derajat; ?>" name="nama"  required>
                            <input type="hidden" class="form-control" id="kd_derajat" value="<?= $a->kd_derajat; ?>" name="kd_derajat" required>
                        </div>
                        <div class="form-group">
                            <label for="grafik">Foto Grafik :</label>
                            <input type="hidden" class="form-control" value="<?= $a->grafik; ?>" id="grafik1" name="old_foto">
                            &ensp;<img src='<?= base_url(); ?>assets/plugins/images/derajat_himpunan/<?= $a->grafik; ?>' width='350' height='255'>
                            <input type="file" class="form-control" id="grafik" name="foto" style="margin-top: 10px;">
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
        <?php $no++; } ?>

        <!-- Start Modal Edit -->
        <div class="modal" id="modal_edit">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Derajat Himpunan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url(); ?>Derajat_himpunan/edit" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="kd_derajat1" name="kd" required>
                            <b><input type="text" class="form-control" id="nm" name="nm" readonly></b>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto :</label><br>
                            <input type="hidden" class="form-control" id="gf" name="old_foto"><center>
                            &ensp;<img src='<?= base_url(); ?>assets/plugins/images/derajat_himpunan/<?= $k->grafik; ?>' width='420' height='305'></center>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
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
                url : "<?= base_url(); ?>Derajat_himpunan/get_data_derajat_edit",
                data:{id : id},
                method:'GET',
                dataType:'json',
                success:function(response) {
                $.each(response, function(i, item){
                    $('#kd_derajat1').val(response[i].kd_derajat);
                    $('#nm').val(response[i].nm_derajat);
                    $('#gf').val(response[i].grafik);
                    $('#modal_edit').modal({backdrop: 'static', keyboard: true, show: true});
                });
                }
            });
        });
    });
</script>