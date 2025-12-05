
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <!-- <script src="<?= base_url(); ?>assets/chart/Chart.js"></script> -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Grafik Data Anggota Baru NDC</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="<?= base_url(); ?>Anggota_baru/index" class="btn btn-md btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-6 data-tables">
                        <div class="white-box" style="box-shadow: 1px 0px 4px 1px;">
                            <h3 class="box-title dataTable">Grafik Data Jenis Kelamin Anggota Baru NDC</h3>
                            <!-- <a href="<?php echo base_url();?>ruangan/import" class="btn btn-sm btn-danger">Import</a> -->
                            <hr>
                            <canvas id="myChart"></canvas>
                            <?php
                                $jkel = "";
                                $jumlah = null;

                                foreach ($grafik_jkel as $item) {
                                    $jkl = $item->jkel;
                                    $jkel .= "'$jkl'" . ", ";

                                    $jum = $item->total;
                                    $jumlah .= "'$jum'" . ", ";
                                }
                            ?>

                            <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type : 'bar',
                                    data : {
                                        labels : [<?= $jkel; ?>],
                                        datasets : [{
                                            label : 'Data Jenis Kelamin Anggota Baru',
                                            backgroundColor : ['#e32222','#eb34cc'],
                                            data : [<?= $jumlah; ?>],
                                        }]
                                    },
                                    options : {
                                        scales : {
                                            yAxes : [{
                                                ticks : {
                                                    beginAtZero : true
                                                }
                                            }]
                                        }
                                    },
                                });
                            </script><br><br>
                        </div>
                    </div>
                <!-- /.row -->
                <!-- /row -->
                    <div class="col-sm-6 data-tables">
                        <div class="white-box" style="box-shadow: 1px 0px 4px 1px;">
                            <h3 class="box-title dataTable">Grafik Data Jurusan Anggota Baru NDC</h3>
                            <!-- <a href="<?php echo base_url();?>ruangan/import" class="btn btn-sm btn-danger">Import</a> -->
                            <hr>
                            <canvas id="myChart1"></canvas>
                            <?php
                                $jurusan = "";
                                $jumlah = null;

                                foreach ($grafik_jur as $item) {
                                    $jur = $item->jurusan;
                                    $jurusan .= "'$jur'" . ", ";

                                    $jum = $item->total;
                                    $jumlah .= "'$jum'" . ", ";
                                }
                            ?>

                            <script>
                                var ctx1 = document.getElementById('myChart1').getContext('2d');
                                var chart1 = new Chart(ctx1, {
                                    type : 'bar',
                                    data : {
                                        labels : [<?= $jurusan; ?>],
                                        datasets : [{
                                            label : 'Data Jurusan Anggota Baru',
                                            backgroundColor : ['#3459eb','#46eb34','#e32222'],
                                            data : [<?= $jumlah; ?>],
                                        }]
                                    },
                                    options : {
                                        scales : {
                                            yAxes : [{
                                                ticks : {
                                                    beginAtZero : true
                                                }
                                            }]
                                        }
                                    },
                                });
                            </script><br><br>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2023 &copy; NIPHAZ DIPLOMA CLUB UNIVERSITAS DIPA MAKASSAR </footer>
        </div>
