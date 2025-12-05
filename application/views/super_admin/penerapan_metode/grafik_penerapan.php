
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <!-- <script src="<?= base_url(); ?>assets/chart/Chart.js"></script> -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Grafik Penerapan Metode Fuzzy Tsukamoto</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12 data-tables">
                        <div class="white-box" style="box-shadow: 1px 0px 4px 1px;">
                            <h3 class="box-title dataTable">Grafik Penerapan Metode</h3>
                            <a href="<?= base_url(); ?>Penerapan_metode/index" class="btn btn-md btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            <!-- <a href="<?php echo base_url();?>ruangan/import" class="btn btn-sm btn-danger">Import</a> -->
                            <br><hr>
                            <canvas id="myChart"></canvas>
                            <?php
                                $keterangan = "";
                                $jumlah = null;

                                foreach ($grafik_penerapan as $item) {
                                    if ($item->predikat == "") {
                                        $ket = "Belum diterapkan";
                                    } else {
                                        $ket = $item->predikat;
                                    }
                                    $keterangan .= "'$ket'" . ", ";

                                    $jum = $item->total;
                                    $jumlah .= "'$jum'" . ", ";
                                }
                            ?>

                            <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type : 'pie',
                                    data : {
                                        labels : [<?= $keterangan; ?>],
                                        datasets : [{
                                            label : 'Data Penerapan Metode Fuzzy Tsukamoto',
                                            backgroundColor : ['#a39e91', '#39e322','#e32222'],
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
