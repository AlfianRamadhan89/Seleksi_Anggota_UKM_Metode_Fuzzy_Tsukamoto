
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Rule (Aturan)</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12 data-tables">
                        <div class="white-box" style="box-shadow: 1px 0px 4px 1px;">
                            <h3 class="box-title dataTable">Data Rule (Aturan)</h3>
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
                                            <th>Kode Rule</th>
                                            <th>Rule (Aturan)</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($rule as $k) {
                                        ?>
                                        <tr>
                                            <!-- <td><?= $no; ?></td> -->
                                            <td><?= $k->kd_rule; ?></td>
                                            <td><?= $k->nm_rule; ?></td>
                                            <td>
                                            <a href="<?= base_url(); ?>Rule/hapus/<?= $k->kd_rule; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Data Akan diHapus?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <button class="btn btn-sm btn-warning view_detail" relid="<?= $k->kd_rule; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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
                    <h4 class="modal-title">Tambah Rule (Aturan)</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url(); ?>Rule/tambah" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="nama1">Nama Rule (Aturan) :</label>
                            <input type="text" class="form-control" id="nama1" name="nama" required>
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
                    <h4 class="modal-title">Edit Rule (Aturan)</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url(); ?>Rule/edit" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Rule (Aturan) :</label>
                            <input type="text" class="form-control" id="nama" name="nama"  required>
                            <input type="hidden" class="form-control" id="kd_rule" name="kd" required>
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
                url : "<?= base_url(); ?>Rule/get_data_rule_edit",
                data:{id : id},
                method:'GET',
                dataType:'json',
                success:function(response) {
                $.each(response, function(i, item){
                    $('#kd_rule').val(response[i].kd_rule);
                    $('#nama').val(response[i].nm_rule);
                    $('#modal_edit').modal({backdrop: 'static', keyboard: true, show: true});
                });
                }
            });
        });
    });
</script>