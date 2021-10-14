<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Sistem Survey</title>

    <meta name="description" content="SI Pondok Preneur" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/chosen.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap-duallistbox.min.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/ace-rtl.min.css" />


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/ace-rtl.min.css" />

    <!-- ace settings handler -->
    <script src="<?php echo base_url() ?>assets/admin/js/ace-extra.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/jquery-1.11.3.min.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/amcharts/amcharts.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/amcharts/radar.js"></script>


</head>
<?php $this->load->view("part/sidebar"); ?>

<?php foreach ($p1 as $d) { } ?></h3>
<?php if (empty($perusahaan_1) | in_array("0", $perusahaan_1)) {
    echo "<font color='red'>Masih ada nilai kosong</font>";
} else { ?>

    <?php foreach ($perusahaan_1 as $row) {
            $q1[] = $row->quiz;
        }
        foreach ($perusahaan_2 as $row2) {
            $q2[] = $row2->quiz;
        } ?>
    <script>
        var chart = AmCharts.makeChart("order", {
            "type": "radar",
            "theme": "light",
            "dataProvider": [{
                "komponen": "Technoware",
                "perusahaan_1": <?php echo $q1[0]; ?>,
                "perusahaan_2": <?php echo $q2[0]; ?>
            }, {
                "komponen": "Humanware",
                "perusahaan_1": <?php echo $q1[1]; ?>,
                "perusahaan_2": <?php echo $q2[1]; ?>
            }, {
                "komponen": "Infoware",
                "perusahaan_1": <?php echo $q1[2]; ?>,
                "perusahaan_2": <?php echo $q1[2]; ?>
            }, {
                "komponen": "Orgaware",
                "perusahaan_1": <?php echo $q1[3]; ?>,
                "perusahaan_2": <?php echo $q1[3]; ?>
            }],

            "valueAxes": [{
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0.15
            }, {
                "id": "v2",
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0
            }],
            "startDuration": 0.5,
            "graphs": [{
                "balloonText": "Nilai Perusahaan yang dihitung : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_1"
            }, {
                "balloonText": "Nilai Perusahaan Referensi : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_2",
                "valueAxis": "v2"
            }],
            "categoryField": "komponen"
        });

        /*Chart 2*/
        var chart = AmCharts.makeChart("timbang", {
            "type": "radar",
            "theme": "light",
            "dataProvider": [{

                "komponen": "Technoware",
                "perusahaan_1": <?php echo $q1[4]; ?>,
                "perusahaan_2": <?php echo $q2[4]; ?>
            }, {
                "komponen": "Humanware",
                "perusahaan_1": <?php echo $q1[5]; ?>,
                "perusahaan_2": <?php echo $q2[5]; ?>
            }, {
                "komponen": "Infoware",
                "perusahaan_1": <?php echo $q1[6]; ?>,
                "perusahaan_2": <?php echo $q2[6]; ?>
            }, {
                "komponen": "Orgaware",
                "perusahaan_1": <?php echo $q1[7]; ?>,
                "perusahaan_2": <?php echo $q2[7]; ?>
            }],
            "valueAxes": [{
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0.15
            }, {
                "id": "v2",
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0
            }],
            "startDuration": 0.5,
            "graphs": [{
                "balloonText": "Nilai Perusahaan yang dihitung : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_1"
            }, {
                "balloonText": "Nilai Perusahaan Referensi : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_2",
                "valueAxis": "v2"
            }],
            "categoryField": "komponen"
        });

        /*Chart 3*/
        var chart = AmCharts.makeChart("sortir", {
            "type": "radar",
            "theme": "light",
            "dataProvider": [{

                "komponen": "Technoware",
                "perusahaan_1": <?php echo $q1[8]; ?>,
                "perusahaan_2": <?php echo $q2[8]; ?>
            }, {
                "komponen": "Humanware",
                "perusahaan_1": <?php echo $q1[9]; ?>,
                "perusahaan_2": <?php echo $q2[9]; ?>
            }, {
                "komponen": "Infoware",
                "perusahaan_1": <?php echo $q1[10]; ?>,
                "perusahaan_2": <?php echo $q2[10]; ?>
            }, {
                "komponen": "Orgaware",
                "perusahaan_1": <?php echo $q1[11]; ?>,
                "perusahaan_2": <?php echo $q2[11]; ?>
            }],
            "valueAxes": [{
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0.15
            }, {
                "id": "v2",
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0
            }],
            "startDuration": 0.5,
            "graphs": [{
                "balloonText": "Nilai Perusahaan yang dihitung : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_1"
            }, {
                "balloonText": "Nilai Perusahaan Referensi : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_2",
                "valueAxis": "v2"
            }],
            "categoryField": "komponen"
        });

        /*Chart 4*/
        var chart = AmCharts.makeChart("kemas", {
            "type": "radar",
            "theme": "light",
            "dataProvider": [{

                "komponen": "Technoware",
                "perusahaan_1": <?php echo $q1[12]; ?>,
                "perusahaan_2": <?php echo $q2[12]; ?>
            }, {
                "komponen": "Humanware",
                "perusahaan_1": <?php echo $q1[13]; ?>,
                "perusahaan_2": <?php echo $q2[13]; ?>
            }, {
                "komponen": "Infoware",
                "perusahaan_1": <?php echo $q1[14]; ?>,
                "perusahaan_2": <?php echo $q2[14]; ?>
            }, {
                "komponen": "Orgaware",
                "perusahaan_1": <?php echo $q1[15]; ?>,
                "perusahaan_2": <?php echo $q2[15]; ?>
            }],
            "valueAxes": [{
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0.15
            }, {
                "id": "v2",
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0
            }],
            "startDuration": 0.5,
            "graphs": [{
                "balloonText": "Nilai Perusahaan yang dihitung : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_1"
            }, {
                "balloonText": "Nilai Perusahaan Referensi : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_2",
                "valueAxis": "v2"
            }],
            "categoryField": "komponen"
        });

        /*Chart 5*/
        var chart = AmCharts.makeChart("simpan", {
            "type": "radar",
            "theme": "light",
            "dataProvider": [{

                "komponen": "Technoware",
                "perusahaan_1": <?php echo $q1[16]; ?>,
                "perusahaan_2": <?php echo $q2[16]; ?>
            }, {
                "komponen": "Humanware",
                "perusahaan_1": <?php echo $q1[17]; ?>,
                "perusahaan_2": <?php echo $q2[17]; ?>
            }, {
                "komponen": "Infoware",
                "perusahaan_1": <?php echo $q1[18]; ?>,
                "perusahaan_2": <?php echo $q2[18]; ?>
            }, {
                "komponen": "Orgaware",
                "perusahaan_1": <?php echo $q1[19]; ?>,
                "perusahaan_2": <?php echo $q2[19]; ?>
            }],
            "valueAxes": [{
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0.15
            }, {
                "id": "v2",
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0
            }],
            "startDuration": 0.5,
            "graphs": [{
                "balloonText": "Nilai Perusahaan yang dihitung : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_1"
            }, {
                "balloonText": "Nilai Perusahaan Referensi : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_2",
                "valueAxis": "v2"
            }],
            "categoryField": "komponen"
        });

        /*Chart 6*/
        var chart = AmCharts.makeChart("kirim", {
            "type": "radar",
            "theme": "light",
            "dataProvider": [{

                "komponen": "Technoware",
                "perusahaan_1": <?php echo $q1[20]; ?>,
                "perusahaan_2": <?php echo $q2[20]; ?>
            }, {
                "komponen": "Humanware",
                "perusahaan_1": <?php echo $q1[21]; ?>,
                "perusahaan_2": <?php echo $q2[21]; ?>
            }, {
                "komponen": "Infoware",
                "perusahaan_1": <?php echo $q1[22]; ?>,
                "perusahaan_2": <?php echo $q2[22]; ?>
            }, {
                "komponen": "Orgaware",
                "perusahaan_1": <?php echo $q1[23]; ?>,
                "perusahaan_2": <?php echo $q2[23]; ?>
            }],
            "valueAxes": [{
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0.15
            }, {
                "id": "v2",
                "maximum": 5,
                "autoGridCount": false,
                "axisTitleOffset": 5,
                "minimum": 0,
                "axisAlpha": 0
            }],
            "startDuration": 0.5,
            "graphs": [{
                "balloonText": "Nilai Perusahaan yang dihitung : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_1"
            }, {
                "balloonText": "Nilai Perusahaan Referensi : [[value]]",
                "bullet": "round",
                "valueField": "perusahaan_2",
                "valueAxis": "v2"
            }],
            "categoryField": "komponen"
        });
    </script>


    <div class="page-header">
        <h1>
            Radar Diagram <?php echo $q1[1]; ?>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">

        <div class="col-sm-12">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#tab_order">Order</a></li>
                    <li><a data-toggle="tab" href="#tab_timbang">Timbang</a></li>
                    <li><a data-toggle="tab" href="#tab_sortir">Sortir</a></li>
                    <li><a data-toggle="tab" href="#tab_kemas">Kemas</a></li>
                    <li><a data-toggle="tab" href="#tab_simpan">Simpan</a></li>
                    <li><a data-toggle="tab" href="#tab_kirim">Kirim</a></li>
                </ul>

                <div class="tab-content">
                    <div id="tab_order" class="tab-pane fade in active">
                        <div class="widget-box widget-color-green">
                            <div class="widget-header">
                                <h5 class="widget-title bigger lighter">Proses Order</h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <ul class="list-unstyled spaced2">
                                        <center>
                                            <div id="order" style="width:400px; height:300px;"></div>
                                        </center>
                                        <center li class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FCD202;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan yang diukur :<br><?php foreach ($p1 as $row) {
                                                                                                            echo $row->nama_perusahaan;
                                                                                                        } ?></p>
                                        </center>

                                        <center class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FF6600;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan Referensi :<br><?php foreach ($p2 as $row) {
                                                                                                        echo $row->nama_perusahaan;
                                                                                                    } ?></p>
                                        </center>
                                        <?php foreach ($p2 as $row) {
                                                echo "<br>";
                                            } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab_timbang" class="tab-pane fade">
                        <div class="widget-box widget-color-orange">
                            <div class="widget-header">
                                <h5 class="widget-title bigger lighter">Proses Timbang</h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <ul class="list-unstyled spaced2">
                                        <center>
                                            <div id="timbang" style="width:400px; height:300px;"></div>
                                        </center>
                                        <center li class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FCD202;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan yang diukur :<br><?php foreach ($p1 as $row) {
                                                                                                            echo $row->nama_perusahaan;
                                                                                                        } ?></p>
                                        </center>
                                        <center class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FF6600;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan Referensi :<br><?php foreach ($p2 as $row) {
                                                                                                        echo "$row->nama_perusahaan<br>";
                                                                                                    } ?></p>
                                        </center>
                                        <?php foreach ($p2 as $row) {
                                                echo "<br>";
                                            } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab_sortir" class="tab-pane fade">
                        <div class="widget-box widget-color-dark">
                            <div class="widget-header">
                                <h5 class="widget-title bigger lighter">Proses Sortir</h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <ul class="list-unstyled spaced2">
                                        <center>
                                            <div id="sortir" style="width:400px; height:300px;"></div>
                                        </center>
                                        <center li class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FCD202;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan yang diukur :<br><?php foreach ($p1 as $row) {
                                                                                                            echo $row->nama_perusahaan;
                                                                                                        } ?></p>
                                        </center>
                                        <center class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FF6600;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan Referensi :<br><?php foreach ($p2 as $row) {
                                                                                                        echo "$row->nama_perusahaan<br>";
                                                                                                    } ?></p>
                                        </center>
                                        <?php foreach ($p2 as $row) {
                                                echo "<br>";
                                            } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab_kemas" class="tab-pane fade">
                        <div class="widget-box widget-color-red">
                            <div class="widget-header">
                                <h5 class="widget-title bigger lighter">Proses Pengemasan</h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <ul class="list-unstyled spaced2">
                                        <center>
                                            <div id="kemas" style="width:400px; height:300px;"></div>
                                        </center>
                                        <center li class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FCD202;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan yang diukur :<br><?php foreach ($p1 as $row) {
                                                                                                            echo $row->nama_perusahaan;
                                                                                                        } ?></p>
                                        </center>
                                        <center class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FF6600;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan Referensi :<br><?php foreach ($p2 as $row) {
                                                                                                        echo "$row->nama_perusahaan<br>";
                                                                                                    } ?></p>
                                        </center>
                                        <?php foreach ($p2 as $row) {
                                                echo "<br>";
                                            } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab_simpan" class="tab-pane fade">
                        <div class="widget-box widget-color-blue">
                            <div class="widget-header">
                                <h5 class="widget-title bigger lighter">Proses Penyimpanan</h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <ul class="list-unstyled spaced2">
                                        <center>
                                            <div id="simpan" style="width:400px; height:300px;"></div>
                                        </center>
                                        <center li class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FCD202;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan yang diukur :<br><?php foreach ($p1 as $row) {
                                                                                                            echo $row->nama_perusahaan;
                                                                                                        } ?></p>
                                        </center>
                                        <center class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FF6600;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan Referensi :<br><?php foreach ($p2 as $row) {
                                                                                                        echo "$row->nama_perusahaan<br>";
                                                                                                    } ?></p>
                                        </center>
                                        <?php foreach ($p2 as $row) {
                                                echo "<br>";
                                            } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab_kirim" class="tab-pane fade">
                        <div class="widget-box widget-color-grey">
                            <div class="widget-header">
                                <h5 class="widget-title bigger lighter">Proses Pengiriman</h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <ul class="list-unstyled spaced2">
                                        <center>
                                            <div id="kirim" style="width:400px; height:300px;"></div>
                                        </center>
                                        <center li class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FCD202;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan yang diukur :<br><?php foreach ($p1 as $row) {
                                                                                                            echo $row->nama_perusahaan;
                                                                                                        } ?></p>
                                        </center>
                                        <center class="col-xs-6">
                                            <div style="width:10px;height:10px;background-color:#FF6600;border-radius:50%;overflow:hidden;"></div>
                                            <p style="font-size:70%;">Perusahaan Referensi :<br><?php foreach ($p2 as $row) {
                                                                                                        echo "$row->nama_perusahaan<br>";
                                                                                                    } ?></p>
                                        </center>
                                        <?php foreach ($p2 as $row) {
                                                echo "<br>";
                                            } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- /.row -->
<?php } ?>

</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<?php $this->load->view("part/footer"); ?>