        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                            class="hide-menu"></span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="<?= base_url(); ?>dashboard/" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>Aspek_penilaian/index" class="waves-effect"><i class="fa fa-book fa-fw"
                                aria-hidden="true"></i>Aspek Penilaian</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>Derajat_himpunan/index" class="waves-effect"><i class="fa fa-area-chart fa-fw"
                                aria-hidden="true"></i>Derajat Himpunan</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>Rule/index" class="waves-effect"><i class="fa fa-legal fa-fw"
                                aria-hidden="true"></i>Rule</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>Anggota_baru/index" class="waves-effect"><i class="fa fa-users fa-fw"
                                aria-hidden="true"></i>Anggota Baru</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>Penilaian/index" class="waves-effect"><i class="fa fa-edit fa-fw"
                                aria-hidden="true"></i>Penilaian Anggota Baru</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>Penerapan_metode/index" class="waves-effect"><i class="fa fa-hourglass-half fa-fw"
                                aria-hidden="true"></i>Penerapan Metode</a>
                    </li>
                    <!-- <li>
                        <a href="<?= base_url(); ?>laporan/index" class="waves-effect"><i class="fa fa-file fa-fw"
                                aria-hidden="true"></i>Laporan</a>
                    </li> -->
                    <!-- <li>
                        <a href="<?= base_url(); ?>Akun/index" class="waves-effect"><i class="fa fa-user fa-fw"
                                aria-hidden="true"></i>Manajemen Akun</a>
                    </li> -->
                    <!-- <li>
                        <a href="<?= base_url(); ?>Siswa/index" class="waves-effect"><i class="fa  fa-graduation-cap fa-fw"
                                aria-hidden="true"></i>Siswa</a>
                    </li> -->
                    <!-- <li>
                        <a href="<?= base_url(); ?>Guru/index" class="waves-effect"><i class="fa fa-users fa-fw"
                                aria-hidden="true"></i>Guru</a>
                    </li> -->
                    <!-- <li>
                        <a href="<?= base_url(); ?>pelanggaran_siswa/index" class="waves-effect"><i class="fa fa-edit fa-fw"
                                aria-hidden="true"></i> Pelanggaran Siswa</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>tentang_kami/index" class="waves-effect"><i class="fa fa-file-text fa-fw"
                                aria-hidden="true"></i>Tentang Kami</a>
                    </li> -->
                </ul>
                <div class="center p-20">
                    <a href="<?= base_url(); ?>login/logout" onclick="return confirm('Anda yakin ingin Logout?')" class="btn btn-danger btn-block waves-effect waves-light">Logout </a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ==============================================================