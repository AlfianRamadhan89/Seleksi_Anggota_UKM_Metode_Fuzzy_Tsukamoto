
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">ANGGOTA BARU</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12 data-tables">
                        <div class="white-box" style="box-shadow: 1px 0px 4px 1px;">
                            <h3 class="box-title dataTable">DATA ANGGOTA BARU</h3>
                            <button data-toggle="modal" data-target="#myModal" class="btn btn-md btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                            <a href="<?= base_url(); ?>Anggota_baru/grafik" class="btn btn-md btn-warning"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
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
                                    $pesan = "Maaf STB Anggota Baru telah terdaftar! Silahkan Cek Ulang Kembali Data!";
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
                                            <th>Nama</th>
                                            <th>Jurusan</th>
                                            <th>Foto</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($anggota_baru as $k) {
                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $k->stb; ?></td>
                                            <td><?= $k->nama; ?></td>
                                            <td><?= $k->jurusan; ?></td>
                                            <td><center><img src='<?= base_url(); ?>assets/plugins/images/users/<?= $k->foto; ?>' width='100' height='100'></center></td>
                                            <td>
                                            <!-- <button class="btn btn-sm btn-info view_detail" relid="<?= $k->stb;  ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></button> -->
                                            <a href="<?= base_url(); ?>Anggota_baru/detail/<?= $k->stb; ?>" class="btn btn-sm btn-info"><i class="fa fa-info-circle"></i></a>
                                            <a href="<?= base_url(); ?>Anggota_baru/hapus/<?= $k->stb; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Data Akan diHapus?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <button data-toggle="modal" data-target="#edit<?= $no; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <!-- <button class="btn btn-sm btn-warning edit_detail" relid="<?= $k->stb; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->
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
                    <h4 class="modal-title">Tambah Data Anggota Baru</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url(); ?>Anggota_baru/tambah" method="post" enctype="multipart/form-data">
                <!-- Modal body -->
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="stb">STB : </label>
                            <input type="number" class="form-control" id="stb" name="stb" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama : </label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir : </label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tggl_lahir">Tanggal Lahir :</label>
                            <input type="date" class="form-control" id="tggl_lahir" name="tggl_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="jkl">Jenis Kelamin : </label>
                            <select id="jkl" name="jkl" class="form-control" required>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor HP / WA :</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="jur">Jurusan : </label>
                            <select id="jur" name="jur" class="form-control" required>
                                <option value="" selected disabled> -- Pilih -- </option>
                                <option value="Sistem Informasi (S1)">Sistem Informasi (S1)</option>
                                <option value="Teknik Informatika (S1)">Teknik Informatika (S1)</option>
                                <option value="Rekayasa Perangkat Lunak (S1)">Rekayasa Perangkat Lunak (S1)</option>
                                <option value="Bisnis Digital (S1)">Bisnis Digital (S1)</option>
                                <option value="Kewirausahaan (S1)">Kewirausahaan (S1)</option>
                                <option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto :</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <!-- Pindah Ke Manajemen Akun -->
                        <!-- <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password :</label>
                            <input type="password" class="form-control" id="pass" name="pass" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Akun :</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div> -->
                        <!-- Template Radio Button -->
                        <!-- <div class="form-check form-check-inline">
                                <input class="form-check-input primary" type="radio" name="radio-solid-primary" id="primary-radio" value="option1">
                                <label class="form-check-label" for="primary-radio">Default</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input primary" type="radio" name="radio-solid-primary" id="primary2-radio" value="option1" checked="">
                                <label class="form-check-label" for="primary2-radio">Checked</label>
                            </div> -->
                        <!-- <div class="form-group">
                            <label for="email">Nama Wali Kelas:</label>
                            <select class="form-control" name="wali_kelas" required>
                                <option>-- pilih wali kelas --</option>
                                <?php foreach($guru as $g){ ?>
                                <option value="<?= $g->id_guru; ?>" ><?= $g->nama_guru; ?></option>
                                <?php }?>
                            </select>
                        </div> -->
                        
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
        foreach ($anggota_baru as $a) {
        ?>
        <!-- <div class="modal" id="modal_edit"> -->
        <div class="modal" id="edit<?= $no; ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Anggota Baru</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url(); ?>Anggota_baru/edit" method="post" enctype="multipart/form-data">
                <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="stb1">STB :</label>
                            <input type="number" class="form-control" value="<?= $a->stb; ?>" id="stb1" name="stb" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama1">Nama :</label>
                            <input type="text" class="form-control" value="<?= $a->nama; ?>" id="nama1" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="tmpt_lahir">Tempat Lahir :</label>
                            <input type="text" class="form-control" value="<?= $a->tmpt_lahir; ?>" id="tmpt_lahir" name="tmpt_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir :</label>
                            <input type="date" class="form-control" value="<?= $a->tgl_lahir; ?>" id="tgl_lahir" name="tggl_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="jkel">Jenis Kelamin : </label>
                            <select id="jkel" name="jkl" class="form-control" required>
                                <option value="Laki - Laki" <?php if ($a->jkel == 'Laki - Laki') { echo 'selected'; } ?> >Laki - Laki</option>
                                <option value="Perempuan" <?php if ($a->jkel == 'Perempuan') { echo 'selected'; } ?> >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat1">Alamat :</label>
                            <textarea class="form-control" id="alamat1" name="alamat" required><?= $a->alamat; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_hp1">Nomor HP / WA :</label>
                            <input type="number" class="form-control" value="<?= $a->no_hp; ?>" id="no_hp1" name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="email1">Email :</label>
                            <input type="email" class="form-control" value="<?= $a->email; ?>" id="email1" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan : </label>
                            <select id="jurusan" name="jur" class="form-control" required>
                                <option value="" <?php if ($a->jurusan == '') { echo 'selected'; } ?> selected disabled> -- Pilih -- </option>
                                <option value="Sistem Informasi (S1)" <?php if ($a->jurusan == 'Sistem Informasi (S1)') { echo 'selected'; } ?> >Sistem Informasi (S1)</option>
                                <option value="Teknik Informatika (S1)" <?php if ($a->jurusan == 'Teknik Informatika (S1)') { echo 'selected'; } ?> >Teknik Informatika (S1)</option>
                                <option value="Rekayasa Perangkat Lunak (S1)" <?php if ($a->jurusan == 'Rekayasa Perangkat Lunak (S1)') { echo 'selected'; } ?> >Rekayasa Perangkat Lunak (S1)</option>
                                <option value="Bisnis Digital (S1)" <?php if ($a->jurusan == 'Bisnis Digital (S1)') { echo 'selected'; } ?> >Bisnis Digital (S1)</option>
                                <option value="Kewirausahaan (S1)" <?php if ($a->jurusan == 'Kewirausahaan (S1)') { echo 'selected'; } ?> >Kewirausahaan (S1)</option>
                                <option value="Manajemen Informatika (D3)" <?php if ($a->jurusan == 'Manajemen Informatika (D3)') { echo 'selected'; } ?> >Manajemen Informatika (D3)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto :</label>
                            <input type="hidden" class="form-control" value="<?= $a->foto; ?>" id="foto1" name="old_foto">
                            &ensp;<img src='<?= base_url(); ?>assets/plugins/images/users/<?= $a->foto; ?>' width='100' height='100'>
                            <input type="file" class="form-control" id="foto" name="foto" style="margin-top: 10px;">
                        </div>
                        <!-- Pindah Ke Manajemen Akun -->
                        <!-- <div class="form-group">
                            <label for="username1">Username :</label>
                            <input type="text" class="form-control" id="username1" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="password" class="form-control" id="password" name="pass" required>
                        </div>
                        <div class="form-group">
                            <label for="status_akun">Status Akun :</label>
                            <select id="status_akun" name="status" class="form-control" required>
                                <option value="aktif" <?php if ($a->status_akun == 'Aktif') { echo 'selected'; } ?> >Aktif</option>
                                <option value="tidak aktif" <?php if ($a->status_akun == 'Tidak Aktif') { echo 'selected'; } ?> >Tidak Aktif</option>
                            </select>
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="email">Nama Wali Kelas:</label> 
                            <select class="form-control" name="wali_kelas" id="wali_kelas" required>
                                <option>-- pilih wali kelas --</option>
                                <?php foreach($guru as $g){ ?>
                                <option value="<?= $g->id_guru; ?>" ><?= $g->nama_guru; ?></option>
                                <?php }?>
                            </select>
                        </div> -->
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

        <!-- Start Modal View -->
         <div class="modal" id="modal_view">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data Anggota Baru</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url(); ?>Anggota_baru/edit" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="stb2">STB :</label>
                            <input type="number" class="form-control" id="stb2" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama2">Nama : </label>
                            <input type="text" class="form-control" id="nama2" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="tmpt_lahir2">Tempat Lahir :</label>
                            <input type="text" class="form-control" id="tmpt_lahir2" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir2">Tanggal Lahir :</label>
                            <input type="date" class="form-control" id="tgl_lahir2" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="jkel2">Jenis Kelamin : </label>
                            <select id="jkel2" class="form-control" required disabled>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat2">Alamat :</label>
                            <textarea class="form-control" id="alamat2" required readonly></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_hp2">Nomor HP / WA :</label>
                            <input type="number" class="form-control" id="no_hp2" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="email2">Email :</label>
                            <input type="email" class="form-control" id="email2" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="jurusan2">Jurusan : </label>
                            <select id="jurusan2" class="form-control" required disabled>
                                <option value="" selected disabled> -- Pilih -- </option>
                                <option value="Sistem Informasi (S1)">Sistem Informasi (S1)</option>
                                <option value="Teknik Informatika (S1)">Teknik Informatika (S1)</option>
                                <option value="Rekayasa Perangkat Lunak (S1)">Rekayasa Perangkat Lunak (S1)</option>
                                <option value="Bisnis Digital (S1)">Bisnis Digital (S1)</option>
                                <option value="Kewirausahaan (S1)">Kewirausahaan (S1)</option>
                                <option value="Manajemen Informatika (D3)">Manajemen Informatika (D3)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto :</label>
                            <input type="hidden" class="form-control" id="foto2" name="old_foto">
                            &ensp;<img src='<?= base_url(); ?>assets/plugins/images/users/<?= $k->foto; ?>' width='100' height='100'>
                        </div>
                        <!-- Pindah Ke Manajemen Akun -->
                        <!-- <div class="form-group">
                            <label for="username2">Username :</label>
                            <input type="text" class="form-control" id="username2" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="password2">Password :</label>
                            <input type="password" class="form-control" id="password2" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="status_akun2">Status Akun :</label>
                            <select id="status_akun2" class="form-control" required disabled>
                                <option value="aktif">Aktif</option>
                                <option value="tidak aktif">Tidak Aktif</option>
                            </select>
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="email">Nama Wali Kelas:</label> 
                            <select class="form-control" name="wali_kelas" id="wali_kelas" required>
                                <option>-- pilih wali kelas --</option>
                                <?php foreach($guru as $g){ ?>
                                <option value="<?= $g->id_guru; ?>" ><?= $g->nama_guru; ?></option>
                                <?php }?>
                            </select>
                        </div> -->
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- End Modal View -->

<!-- <script type="text/javascript">
// load data for edit
    $(document).ready(function() {
        $('.edit_detail').click(function(){
            var id = $(this).attr('relid'); //get the attribute value
            $.ajax({
                url : "<?= base_url(); ?>Anggota_baru/get_data_anggota_edit",
                data:{id : id},
                method:'GET',
                dataType:'json',
                success:function(response) {
                $.each(response, function(i, item){
                    $('#stb1').val(response[i].stb);
                    $('#nama1').val(response[i].nama); //hold the response in id and show on popup
                    $('#tmpt_lahir').val(response[i].tmpt_lahir);
                    $('#tgl_lahir').val(response[i].tgl_lahir);
                    $('#jkel').val(response[i].jkel);
                    $('#alamat1').val(response[i].alamat);
                    $('#no_hp1').val(response[i].no_hp);
                    $('#email1').val(response[i].email);
                    $('#jurusan').val(response[i].jurusan);
                    $('#username1').val(response[i].username);
                    $('#password').val(response[i].password);
                    $('#foto1').val(response[i].foto);
                    $('#status_akun').val(response[i].status_akun);
                    $('#modal_edit').modal({backdrop: 'static', keyboard: true, show: true});
                });
            }
            });
        });
    });
</script> -->

<script type="text/javascript">
// load data for view
    $(document).ready(function() {
        $('.view_detail').click(function() {
            var id = $(this).attr('relid'); //get the attribute value
            $.ajax({
                url : "<?= base_url(); ?>Anggota_baru/get_data_anggota_edit",
                data:{id : id},
                method:'GET',
                dataType:'json',
                success:function(response) {
                $.each(response, function(i, item){
                    $('#stb2').val(response[i].stb);
                    $('#nama2').val(response[i].nama); //hold the response in id and show on popup
                    $('#tmpt_lahir2').val(response[i].tmpt_lahir);
                    $('#tgl_lahir2').val(response[i].tgl_lahir);
                    $('#jkel2').val(response[i].jkel);
                    $('#alamat2').val(response[i].alamat);
                    $('#no_hp2').val(response[i].no_hp);
                    $('#email2').val(response[i].email);
                    $('#jurusan2').val(response[i].jurusan);
                    $('#foto2').val(response[i].foto);
                    // $('#username2').val(response[i].username);
                    // $('#password2').val(response[i].password);
                    // $('#status_akun2').val(response[i].status_akun);
                    $('#modal_view').modal({backdrop: 'static', keyboard: true, show: true});
                });
                }
            });
        });
    });
</script>