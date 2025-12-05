
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Manajemen Akun</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12 data-tables">
                        <div class="white-box" style="box-shadow: 1px 0px 4px 1px;">
                            <h3 class="box-title dataTable">Data Manajemen Akun</h3>
                            <button data-toggle="modal" data-target="#myModal" class="btn btn-md btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
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
                                    $pesan = "Maaf Data Akun Anggota Baru Telah Dibuat! -> Silahkan Cek Ulang Kembali Data!";
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
                                            <th>Username</th>
                                            <th>Level Akun</th>
                                            <th>Status Akun</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($akun as $k) {
                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $k->stb; ?></td>
                                            <td><?= $k->nama; ?></td>
                                            <td><?= $k->username; ?></td>
                                            <td><?= $k->level; ?></td>
                                            <td><?= $k->status_akun; ?></td>
                                            <td>
                                            <a href="<?= base_url();?>Akun/hapus/<?= $k->id_akun; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Data Akan diHapus?')"><i class="fa fa-trash"></i></a>
                                            <button class="btn btn-sm btn-warning view_detail" relid="<?= $k->id_akun; ?>"><i class="fa fa-pencil-square-o"></i></button>
                                            <!-- <button data-toggle="modal" data-target="#edit<?= $no; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->
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
                    <h4 class="modal-title">Tambah Akun</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url();?>Akun/tambah" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="nim">Nama Akun :</label>
                            <select class="form-control" id="nim" name="stb" required>
                                <option>-- Pilih Calon Anggota --</option>
                                <?php foreach($anggota as $g){ ?>
                                <option value="<?= $g->stb; ?>" ><?= $g->stb . ' | ' . $g->nama; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password :</label>
                            <input type="password" class="form-control" id="pass" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="level">Level Akun :</label>
                            <select class="form-control" id="level" name="level">
                                <option value="" selected disabled>-- Pilih Level --</option>
                                <option value="Anggota Baru">Anggota Baru</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Akun :</label>
                            <select class="form-control" id="status" name="status">
                                <option value="" selected disabled>-- Pilih Status --</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
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

        <!-- <?php
        $no=1;
        foreach($akun as $a){
        ?> -->
         <!-- Start Modal Edit -->
         <!-- <div class="modal" id="edit<?= $no; ?>"> -->
        <div class="modal" id="modal_edit">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Akun</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- <form action="<?= base_url(); ?>/Akun/edit/<?= $a->id_admin; ?>" method="post"> -->
                <form action="<?= base_url(); ?>Akun/edit" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                    <div class="form-group">
                            <label for="stb">Nama Akun :</label>
                            <input type="hidden" id="id" name="id_akun">
                            <select class="form-control" id="stb" name="stb" required>
                                <option>-- Pilih Calon Anggota --</option>
                                <?php foreach($anggota as $g){ ?>
                                <option value="<?= $g->stb; ?>" ><?= $g->stb . ' | ' . $g->nama; ?></option>
                                <?php }?>
                            </select>
                            <!-- <input type="text" class="form-control" id="" value="<?= $a->nama_admin; ?>" name="nama" required> -->
                        </div>
                        <div class="form-group">
                            <label for="user">Username :</label>
                            <input type="text" class="form-control" id="user" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="pas">Password :</label>
                            <input type="password" class="form-control" id="pas" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="lvl">Level Akun :</label>
                            <select class="form-control" id="lvl" name="level">
                                <option value="">-- Pilih Level --</option>
                                <option value="Anggota Baru">Anggota Baru</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sts">Status Akun :</label>
                            <select class="form-control" id="sts" name="status">
                                <option value="" selected disabled>-- Pilih Status --</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
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
        <!-- End Modal Edit -->
        <!-- <?php  $no++; } ?> -->

<script type="text/javascript">
// load data for edit
    $(document).ready(function() {
        $('.view_detail').click(function() {
            var id = $(this).attr('relid'); //get the attribute value
            $.ajax({
                url : "<?= base_url(); ?>Akun/get_data_akun_edit",
                data:{id : id},
                method:'GET',
                dataType:'json',
                success:function(response) {
                $.each(response, function(i, item) {
                    $('#id').val(response[i].id_akun);
                    $('#stb').val(response[i].stb);
                    $('#user').val(response[i].username);
                    $('#pas').val(response[i].password);
                    $('#lvl').val(response[i].level);
                    $('#sts').val(response[i].status_akun);
                    $('#modal_edit').modal({backdrop: 'static', keyboard: true, show: true});
                });
                }
            });
        });
    });
</script>