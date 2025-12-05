
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
                            <h3 class="box-title dataTable">DETAIL DATA ANGGOTA BARU</h3>
                            <div class="table-responsive" style="padding-top:20px;">
                                <font size="4pt">
                                <table width="500px">
                                    <tbody>
                                        <tr>
                                            <th>STB</th>
                                            <th>:&emsp;</th>
                                            <td><?= $detailData->stb; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <th>:&emsp;</th>
                                            <td><?= $detailData->nama; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tempat / Tanggal Lahir</th>
                                            <th>:&emsp;</th>
                                            <td><?= $detailData->tmpt_lahir; ?> / <?= $detailData->tgl_lahir; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <th>:&emsp;</th>
                                            <td><?= $detailData->jkel; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <th>:&emsp;</th>
                                            <td><?= $detailData->alamat; ?></td>
                                        </tr>
                                        <tr>
                                            <th>No HP</th>
                                            <th>:&emsp;</th>
                                            <td><?= $detailData->no_hp; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <th>:&emsp;</th>
                                            <td><?= $detailData->email; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jurusan</th>
                                            <th>:&emsp;</th>
                                            <td><?= $detailData->jurusan; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Foto</th>
                                            <th>:&emsp;</th>
                                            <td><img src='<?= base_url(); ?>assets/plugins/images/users/<?= $detailData->foto; ?>' width='100' height='100'></td>
                                        </tr>
                                        <tr>
                                            <td align="right" colspan="3">
                                            <a href="<?= base_url(); ?>Anggota_baru/index" class="btn btn-xd btn-danger">Kembali</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </font>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2023 &copy; NIPHAZ DIPLOMA CLUB UNIVERSITAS DIPA MAKASSAR </footer>
        </div>