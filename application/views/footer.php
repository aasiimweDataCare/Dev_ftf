</div>
<!-- /#wrapper -->

</div>
</div>
<!--End of Content Body-->

</div>

<!--start of Footer-->
<div align="center" class="row">
    <div class="col-xs-18 col-md-12">
        <img class="img-fade" src="<?php echo base_url() ?>assets/images/logo_footer.png"
             width="221"
             height="60" alt="USAID-logo">
        <footer>
            <div class="container">

                <p>Developed By <a target="_blank" href="http://www.dcareug.com/" rel="author">Data Care (U)
                        Ltd&trade;</a>&nbsp;&nbsp; <a target="_blank" href="http://www.mis.ftfcpm.com:9000/"
                                                      rel="">mis.ftfcpm.com</a> &copy;2014 - <?php echo gmdate('Y'); ?>
                </p>
            </div>
        </footer>
    </div>
</div>
<!--end of Footer-->
</div>
<!-- jQuery -->
<script src="<?php echo base_url() ?>highcharts/lib_js/jquery.min.2.1.4.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url() ?>bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url() ?>dist/js/sb-admin-2.js"></script>
<script src="<?php echo base_url() ?>highcharts/lib_hicharts/js/highcharts.js"></script>
<script src="<?php echo base_url() ?>highcharts/lib_hicharts/js/highcharts-3d.js"></script>
<script src="<?php echo base_url() ?>highcharts/lib_js/drilldown.js"></script>
<script src="<?php echo base_url() ?>highcharts/lib_hicharts/js/highcharts-more.js"></script>
<script src="<?php echo base_url() ?>highcharts/lib_hicharts/js/modules/exporting.js"></script>

<!--indicator four_graph-->
<script type="text/javascript">
    <?php


    $reg_N = 'N';
    $reg_W = 'W';
    $reg_E = 'E';
    $reg_C = 'C';

    $crop_C = 'Coffee';
    $crop_M = 'Maize';
    $crop_B = 'Beans';

    $arr_reg_All = " '".$reg_N."', '".$reg_W."', '".$reg_E."', '".$reg_C."' ";

    foreach ($data_get_i4_VolumesSold_B_N as $row) {
        $b_N =( $row->volumesSold);
    }
    foreach ($data_get_i4_VolumesSold_B_C as $row) {
        $b_C =( $row->volumesSold);
    }
    foreach ($data_get_i4_VolumesSold_B_E as $row) {
        $b_E =( $row->volumesSold );
    }
    foreach ($data_get_i4_VolumesSold_B_W as $row) {
        $b_W =( $row->volumesSold );
    }


    foreach ($data_get_i4_VolumesSold_M_N as $row) {
        $m_N =( $row->volumesSold);
    }
    foreach ($data_get_i4_VolumesSold_M_C as $row) {
        $m_C =( $row->volumesSold);
    }
    foreach ($data_get_i4_VolumesSold_M_E as $row) {
        $m_E =( $row->volumesSold );
    }
    foreach ($data_get_i4_VolumesSold_M_W as $row) {
        $m_W =( $row->volumesSold );
    }

    foreach ($data_get_i4_VolumesSold_C_N as $row) {
        $c_N =( $row->volumesSold);
    }
    foreach ($data_get_i4_VolumesSold_C_C as $row) {
        $c_C =( $row->volumesSold);
    }
    foreach ($data_get_i4_VolumesSold_C_E as $row) {
        $c_E =( $row->volumesSold );
    }
    foreach ($data_get_i4_VolumesSold_C_W as $row) {
        $c_W =( $row->volumesSold );
    }
         $tot_Mt_all =($c_N + $c_W + $c_E + $c_C + $m_N + $m_W + $m_E + $m_C + $b_N + $b_W + $b_E + $b_C);

         $tot_Mt_coffee_all =($c_N + $c_W + $c_E + $c_C );
         $tot_Mt_maize_all =($m_N + $m_W + $m_E + $m_C);
         $tot_Mt_beans_all =($b_N + $b_W + $b_E + $b_C);


        $percent_Mt_coffee = (($tot_Mt_coffee_all/$tot_Mt_all)*100);
        $percent_i4_coffee_N = (($c_N/$tot_Mt_all)*100);
        $percent_i4_coffee_W = (($c_W/$tot_Mt_all)*100);
        $percent_i4_coffee_E = (($c_E/$tot_Mt_all)*100);
        $percent_i4_coffee_C = (($c_C/$tot_Mt_all)*100);

        $percent_Mt_maize = (($tot_Mt_maize_all/$tot_Mt_all)*100);
        $percent_i4_maize_N = (($m_N/$tot_Mt_all)*100);
        $percent_i4_maize_W = (($m_W/$tot_Mt_all)*100);
        $percent_i4_maize_E = (($m_E/$tot_Mt_all)*100);
        $percent_i4_maize_C = (($m_C/$tot_Mt_all)*100);

        $percent_Mt_beans = (($tot_Mt_beans_all/$tot_Mt_all)*100);
        $percent_i4_beans_N = (($b_N/$tot_Mt_all)*100);
        $percent_i4_beans_W = (($b_W/$tot_Mt_all)*100);
        $percent_i4_beans_E = (($b_E/$tot_Mt_all)*100);
        $percent_i4_beans_C = (($b_C/$tot_Mt_all)*100);

        $arr_coffee_all = ''.$percent_i4_coffee_N.','.$percent_i4_coffee_W.','.$percent_i4_coffee_E.','.$percent_i4_coffee_C.'';
        $arr_maize_all = ''.$percent_i4_maize_N.','.$percent_i4_maize_W.','.$percent_i4_maize_E.','.$percent_i4_maize_C.'';
        $arr_beans_all = ''.$percent_i4_beans_N.','.$percent_i4_beans_W.','.$percent_i4_beans_E.','.$percent_i4_beans_C.'';

        $percent_i4_coffee_All = $percent_Mt_coffee;
        $percent_i4_maize_All = $percent_Mt_maize;
        $percent_i4_beans_All = $percent_Mt_beans;

    ?>

    $(function () {

        var colors = Highcharts.getOptions().colors,
            categories = ['<?=$crop_C; ?>', '<?=$crop_M; ?>', '<?=$crop_B; ?>'],
            name = 'Volumes Exported',
            data = [{
                y: <?=$percent_i4_coffee_All; ?>,
                color: colors[6],
                drilldown: {
                    name: '<?=$crop_C; ?>',
                    categories: ['<?=$crop_C.'-'.$reg_N; ?>', '<?=$crop_C.'-'.$reg_W; ?>', '<?=$crop_C.'-'.$reg_E; ?>', '<?=$crop_C.'-'.$reg_C; ?>'],
                    data: [<?=$arr_coffee_all; ?>],
                    color: colors[6]
                }
            }, {
                y: <?=$percent_i4_maize_All; ?>,
                color: colors[7],
                drilldown: {
                    name: '<?=$crop_M; ?>',
                    categories: ['<?=$crop_M.'-'.$reg_N; ?>', '<?=$crop_M.'-'.$reg_W; ?>', '<?=$crop_M.'-'.$reg_E; ?>', '<?=$crop_M.'-'.$reg_C; ?>'],
                    data: [<?=$arr_maize_all; ?>],
                    color: colors[7]
                }
            }, {
                y: <?=$percent_i4_beans_All; ?>,
                color: colors[8],
                drilldown: {
                    name: '<?=$crop_B; ?>',
                    categories: ['<?=$crop_B.'-'.$reg_N; ?>', '<?=$crop_B.'-'.$reg_W; ?>', '<?=$crop_B.'-'.$reg_E; ?>', '<?=$crop_B.'-'.$reg_C; ?>'],
                    data: [<?=$arr_beans_all; ?>],
                    color: colors[8]
                }
            }];


        // Build the data arrays
        var hectaresData = [];
        var regionalData = [];
        for (var i = 0; i < data.length; i++) {

            // add browser data
            hectaresData.push({
                name: categories[i],
                y: data[i].y,
                color: data[i].color
            });

            // add version data
            for (var j = 0; j < data[i].drilldown.data.length; j++) {
                var brightness = 0.2 - (j / data[i].drilldown.data.length) / 5;
                regionalData.push({
                    name: data[i].drilldown.categories[j],
                    y: data[i].drilldown.data[j],
                    color: Highcharts.Color(data[i].color).brighten(brightness).get()
                });
            }
        }

        // Create the chart
        $('#indicator_four').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 30
                }
            },
            title: {
                text: '<?=number_format($tot_Mt_all);?> MT',
                align: 'center',
                margin: 50,
                floating: false,
                style: {
                    color: '#FF00FF',
                    fontWeight: 'bold'
                }
            },


            plotOptions: {
                pie: {
                    shadow: false,
                    center: ['50%', '50%'],
                    depth: 30
                }


            },
            tooltip: {

                pointFormat: '%ge MT volumes Exported: {point.y:.0f}%'

            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'volumes Exported in Metric Tonnes',
                data: hectaresData,
                size: '65%',
                dataLabels: {
                    formatter: function () {
                        return this.y > 5 ? this.point.name : null;
                    },
                    color: '#00215A',
                    distance: -30
                }
            }, {
                name: '%ge MT volumes Exported By Region',
                data: regionalData,
                size: '85%',
                innerSize: '65%',

                dataLabels: {
                    formatter: function () {
                        // display only if larger than 1

                        return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + Highcharts.numberFormat(this.y,0) + '%' : null;
                    }
                }
            }]
        });
    });


</script>

<!--indicator five_graph-->
<script type="text/javascript">
    <?php
    foreach ($data_get_i5_N as $row) {
            $val_Ind5_Yr1_N = $row->Ind5_N_Yr1;
            $val_Ind5_Yr2_N = $row->Ind5_N_Yr2;
            $val_Ind5_Yr3_N = $row->Ind5_N_Yr3;
            $val_Ind5_Yr4_N = $row->Ind5_N_Yr4;
            $val_Ind5_Yr5_N = $row->Ind5_N_Yr5;
            $val_Ind5_Yr6_N = $row->Ind5_N_Yr6;
        }


        foreach ($data_get_i5_W as $row) {
            $val_Ind5_Yr1_W = $row->Ind5_W_Yr1;
            $val_Ind5_Yr2_W = $row->Ind5_W_Yr2;
            $val_Ind5_Yr3_W = $row->Ind5_W_Yr3;
            $val_Ind5_Yr4_W = $row->Ind5_W_Yr4;
            $val_Ind5_Yr5_W = $row->Ind5_W_Yr5;
            $val_Ind5_Yr6_W = $row->Ind5_W_Yr6;
        }


        foreach ($data_get_i5_E as $row) {
            $val_Ind5_Yr1_E = $row->Ind5_E_Yr1;
            $val_Ind5_Yr2_E = $row->Ind5_E_Yr2;
            $val_Ind5_Yr3_E = $row->Ind5_E_Yr3;
            $val_Ind5_Yr4_E = $row->Ind5_E_Yr4;
            $val_Ind5_Yr5_E = $row->Ind5_E_Yr5;
            $val_Ind5_Yr6_E = $row->Ind5_E_Yr6;
        }


        foreach ($data_get_i5_C as $row) {
            $val_Ind5_Yr1_C = $row->Ind5_C_Yr1;
            $val_Ind5_Yr2_C = $row->Ind5_C_Yr2;
            $val_Ind5_Yr3_C = $row->Ind5_C_Yr3;
            $val_Ind5_Yr4_C = $row->Ind5_C_Yr4;
            $val_Ind5_Yr5_C = $row->Ind5_C_Yr5;
            $val_Ind5_Yr6_C = $row->Ind5_C_Yr6;
        }
        
        

        $val_Ind5_Yr1_All = "" . $val_Ind5_Yr1_N . "," . $val_Ind5_Yr1_W . "," . $val_Ind5_Yr1_E . "," . $val_Ind5_Yr1_C . "";
        $val_Ind5_Yr2_All = "" . $val_Ind5_Yr2_N . "," . $val_Ind5_Yr2_W . "," . $val_Ind5_Yr2_E . "," . $val_Ind5_Yr2_C . "";
        $val_Ind5_Yr3_All = "" . $val_Ind5_Yr3_N . "," . $val_Ind5_Yr3_W . "," . $val_Ind5_Yr3_E . "," . $val_Ind5_Yr3_C . "";
        $val_Ind5_Yr4_All = "" . $val_Ind5_Yr4_N . "," . $val_Ind5_Yr4_W . "," . $val_Ind5_Yr4_E . "," . $val_Ind5_Yr4_C . "";
        $val_Ind5_Yr5_All = "" . $val_Ind5_Yr5_N . "," . $val_Ind5_Yr5_W . "," . $val_Ind5_Yr5_E . "," . $val_Ind5_Yr5_C . "";
        $val_Ind5_Yr6_All = "" . $val_Ind5_Yr6_N . "," . $val_Ind5_Yr6_W . "," . $val_Ind5_Yr6_E . "," . $val_Ind5_Yr6_C . "";
     ?>
    $(function () {
        Highcharts.setOptions({
            lang: {
                thousandsSep: ','
            }
        });
        $('#indicator_five').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Source: <a href="http://mis.ftfcpm.com:9000//">CPMA-MIS</a>'
            },
            xAxis: {
                categories: ['North', 'West', 'East', 'Central'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Farmers Trained',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ''
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            tooltip: {
                formatter: function () {
                    var point = this.point,
                        s = Highcharts.numberFormat(this.y, 0, '.') +'<br/>';
                    if (point.drilldown) {
                        s += 'Click to view more By Value Chain';
                    }
                    return s;
                }
            },
            
            credits: {
                enabled: false
            },
            series: [{
                name: 'Year 2013',
                data: [ {y:<?=$val_Ind5_Yr1_N;?>,drilldown: 'north-2013'},
                        {y:<?=$val_Ind5_Yr1_W;?>,drilldown: 'west-2013'},
                        {y:<?=$val_Ind5_Yr1_E;?>,drilldown: 'east-2013'},
                        {y:<?=$val_Ind5_Yr1_C;?>,drilldown: 'central-2013'}
                ]
            }, {
                name: 'Year 2014',
                data: [{y:<?=$val_Ind5_Yr2_N;?>,drilldown: 'north-2014'},
                        {y:<?=$val_Ind5_Yr2_W;?>,drilldown: 'west-2014'},
                        {y:<?=$val_Ind5_Yr2_E;?>,drilldown: 'east-2014'},
                        {y:<?=$val_Ind5_Yr2_C;?>,drilldown: 'central-2014'}
                ]
            }, {
                name: 'Year 2015',
                data: [{y:<?=$val_Ind5_Yr3_N;?>,drilldown: 'north-2015'},
                        {y:<?=$val_Ind5_Yr3_W;?>,drilldown: 'west-2015'},
                        {y:<?=$val_Ind5_Yr3_E;?>,drilldown: 'east-2015'},
                        {y:<?=$val_Ind5_Yr3_C;?>,drilldown: 'central-2015'}
                ]
            }, {
                name: 'Year 2016',
                data: [{y:<?=$val_Ind5_Yr4_N;?>,drilldown: 'north-2016'},
                        {y:<?=$val_Ind5_Yr4_W;?>,drilldown: 'west-2016'},
                        {y:<?=$val_Ind5_Yr4_E;?>,drilldown: 'east-2016'},
                        {y:<?=$val_Ind5_Yr4_C;?>,drilldown: 'central-2016'}
                ]
            }, {
                name: 'Year 2017',
                data: [{y:<?=$val_Ind5_Yr5_N;?>,drilldown: 'north-2017'},
                        {y:<?=$val_Ind5_Yr5_W;?>,drilldown: 'west-2017'},
                        {y:<?=$val_Ind5_Yr5_E;?>,drilldown: 'east-2017'},
                        {y:<?=$val_Ind5_Yr5_C;?>,drilldown: 'central-2017'}
                ]
            }, {
                name: 'Year 2018',
                data: [{y:<?=$val_Ind5_Yr6_N;?>,drilldown: 'north-2018'},
                        {y:<?=$val_Ind5_Yr6_W;?>,drilldown: 'west-2018'},
                        {y:<?=$val_Ind5_Yr6_E;?>,drilldown: 'east-2018'},
                        {y:<?=$val_Ind5_Yr6_C;?>,drilldown: 'central-2018'}
                ]
            }],

            drilldown: {
                _animation: {
                    duration: 2000
                },

                //Start of drill down
                series: [
                {
                    id: 'north-2013',
                    name: '2013',
                    data: [
                        ['Male', <?=$data_get_i5_MaleN['Ind5_C_Yr1'];?>],
                        ['Female', <?=$data_get_i5_FemaleN['Ind5_C_Yr1'];?>]
                        
                    ]
                }, {
                    id: 'west-2013',
                    name: '2013',
                   data: [
                        ['Male', <?=$data_get_i5_MaleW['Ind5_C_Yr1'];?>],
                        ['Female', <?=$data_get_i5_FemaleW['Ind5_C_Yr1'];?>]
                    ]
                }, {
                    id: 'east-2013',
                    name: '2013',
                    data: [
                       ['Male', <?=$data_get_i5_MaleE['Ind5_C_Yr1'];?>],
                        ['Female', <?=$data_get_i5_FemaleE['Ind5_C_Yr1'];?>]
                    ]
                }, {
                    id: 'central-2013',
                    name: '2013',
                    data: [
                        ['Male', <?=$data_get_i5_MaleC['Ind5_C_Yr1'];?>],
                        ['Female', <?=$data_get_i5_FemaleC['Ind5_C_Yr1'];?>]
                    ]
                }, {
                    id: 'north-2014',
                    name: '2014',
                    data: [
                        ['Male', <?=$data_get_i5_MaleN['Ind5_C_Yr2'];?>],
                        ['Female', <?=$data_get_i5_FemaleN['Ind5_C_Yr2'];?>]
                    ]
                }, {
                    id: 'west-2014',
                    name: '2014',
                    data: [
                        ['Male', <?=$data_get_i5_MaleW['Ind5_C_Yr2'];?>],
                        ['Female', <?=$data_get_i5_FemaleW['Ind5_C_Yr2'];?>]
                    ]
                }, {
                    id: 'east-2014',
                    name: '2014',
                    data: [
                        ['Male', <?=$data_get_i5_MaleE['Ind5_C_Yr2'];?>],
                        ['Female', <?=$data_get_i5_FemaleE['Ind5_C_Yr2'];?>]
                    ]
                }, {
                    id: 'central-2014',
                    name: '2014',
                    data: [
                        ['Male', <?=$data_get_i5_MaleC['Ind5_C_Yr2'];?>],
                        ['Female', <?=$data_get_i5_FemaleC['Ind5_C_Yr2'];?>]
                    ]
                },{
                        id: 'north-2015',
                        name: '2015',
                   data: [
                        ['Male', <?=$data_get_i5_MaleN['Ind5_C_Yr3'];?>],
                        ['Female', <?=$data_get_i5_FemaleN['Ind5_C_Yr3'];?>]
                    ]
                    }, {
                        id: 'west-2015',
                        name: '2015',
                        data: [
                        ['Male', <?=$data_get_i5_MaleW['Ind5_C_Yr3'];?>],
                        ['Female', <?=$data_get_i5_FemaleW['Ind5_C_Yr3'];?>]
                    ]
                    }, {
                        id: 'east-2015',
                        name: '2015',
                        data: [
                        ['Male', <?=$data_get_i5_MaleE['Ind5_C_Yr3'];?>],
                        ['Female', <?=$data_get_i5_FemaleE['Ind5_C_Yr3'];?>]
                    ]
                    }, {
                        id: 'central-2015',
                        name: '2015',
                        data: [
                        ['Male', <?=$data_get_i5_MaleC['Ind5_C_Yr3'];?>],
                        ['Female', <?=$data_get_i5_FemaleC['Ind5_C_Yr3'];?>]
                    ]
                    },


                    {
                        id: 'north-2016',
                        name: '2016',
                        data: [
                            ['Male', <?=$data_get_i5_MaleN['Ind5_C_Yr4'];?>],
                            ['Female', <?=$data_get_i5_FemaleN['Ind5_C_Yr4'];?>]
                        ]
                    }, {
                        id: 'west-2016',
                        name: '2016',
                        data: [
                            ['Male', <?=$data_get_i5_MaleW['Ind5_C_Yr4'];?>],
                            ['Female', <?=$data_get_i5_FemaleW['Ind5_C_Yr4'];?>]
                        ]
                    }, {
                        id: 'east-2016',
                        name: '2016',
                        data: [
                            ['Male', <?=$data_get_i5_MaleE['Ind5_C_Yr4'];?>],
                            ['Female', <?=$data_get_i5_FemaleE['Ind5_C_Yr4'];?>]
                        ]
                    }, {
                        id: 'central-2016',
                        name: '2016',
                        data: [
                            ['Male', <?=$data_get_i5_MaleC['Ind5_C_Yr4'];?>],
                            ['Female', <?=$data_get_i5_FemaleC['Ind5_C_Yr4'];?>]
                        ]
                    },


                    {
                        id: 'north-2017',
                        name: '2017',
                        data: [
                            ['Male', <?=$data_get_i5_MaleN['Ind5_C_Yr5'];?>],
                            ['Female', <?=$data_get_i5_FemaleN['Ind5_C_Yr5'];?>]
                        ]
                    }, {
                        id: 'west-2017',
                        name: '2017',
                        data: [
                           ['Male', <?=$data_get_i5_MaleW['Ind5_C_Yr5'];?>],
                           ['Female', <?=$data_get_i5_FemaleW['Ind5_C_Yr5'];?>]
                        ]
                    }, {
                        id: 'east-2017',
                        name: '2017',
                        data: [
                            ['Male', <?=$data_get_i5_MaleE['Ind5_C_Yr5'];?>],
                           ['Female', <?=$data_get_i5_FemaleE['Ind5_C_Yr5'];?>]
                        ]
                    }, {
                        id: 'central-2017',
                        name: '2017',
                        data: [
                           ['Male', <?=$data_get_i5_MaleC['Ind5_C_Yr5'];?>],
                           ['Female', <?=$data_get_i5_FemaleC['Ind5_C_Yr5'];?>]
                        ]
                    },


                    {
                        id: 'north-2018',
                        name: '2018',
                        data: [
                            ['Male', <?=$data_get_i5_MaleN['Ind5_C_Yr6'];?>],
                           ['Female', <?=$data_get_i5_FemaleN['Ind5_C_Yr6'];?>]
                        ]
                    }, {
                        id: 'west-2018',
                        name: '2018',
                        data: [
                            ['Male', <?=$data_get_i5_MaleW['Ind5_C_Yr6'];?>],
                           ['Female', <?=$data_get_i5_FemaleW['Ind5_C_Yr6'];?>]
                        ]
                    }, {
                        id: 'east-2018',
                        name: '2018',
                        data: [
                            ['Male', <?=$data_get_i5_MaleE['Ind5_C_Yr6'];?>],
                           ['Female', <?=$data_get_i5_FemaleE['Ind5_C_Yr6'];?>]
                        ]
                    }, {
                        id: 'central-2018',
                        name: '2018',
                        data: [
                            ['Male', <?=$data_get_i5_MaleC['Ind5_C_Yr6'];?>],
                           ['Female', <?=$data_get_i5_FemaleC['Ind5_C_Yr6'];?>]
                        ]
                    }]
                }


        });
    });


</script>

<!--indicator six_graph Hectares under production-->
<script type="text/javascript">
    <?php


    $reg_N = 'N';
    $reg_W = 'W';
    $reg_E = 'E';
    $reg_C = 'C';

    $crop_C = 'Coffee';
    $crop_M = 'Maize';
    $crop_B = 'Beans';

    $arr_reg_All = " '".$reg_N."', '".$reg_W."', '".$reg_E."', '".$reg_C."' ";
    foreach ($data_get_i6_Coffee as $row) {
        $c_N =( $row->Coffee_N * Ha );
        $c_W =( $row->Coffee_W * Ha );
        $c_E =( $row->Coffee_E * Ha );
        $c_C =( $row->Coffee_C * Ha );
         }

    foreach ($data_get_i6_Maize as $row) {
        $m_N =( $row->Maize_N * Ha );
        $m_W =( $row->Maize_W * Ha );
        $m_E =( $row->Maize_E * Ha );
        $m_C =( $row->Maize_C * Ha );
        }

    foreach ($data_get_i6_Beans as $row) {
        $b_N =( $row->Beans_N * Ha );
        $b_W =( $row->Beans_W * Ha );
        $b_E =( $row->Beans_E * Ha );
        $b_C =( $row->Beans_C * Ha );
         }

         $tot_Ha_all =($c_N + $c_W + $c_E + $c_C + $m_N + $m_W + $m_E + $m_C + $b_N + $b_W + $b_E + $b_C);

         $tot_Ha_coffee_all =($c_N + $c_W + $c_E + $c_C );
         $tot_Ha_maize_all =($m_N + $m_W + $m_E + $m_C);
         $tot_Ha_beans_all =($b_N + $b_W + $b_E + $b_C);


        $percent_Ha_coffee = (($tot_Ha_coffee_all/$tot_Ha_all)*100);
        $percent_i6_coffee_N = (($c_N/$tot_Ha_all)*100);
        $percent_i6_coffee_W = (($c_W/$tot_Ha_all)*100);
        $percent_i6_coffee_E = (($c_E/$tot_Ha_all)*100);
        $percent_i6_coffee_C = (($c_C/$tot_Ha_all)*100);

        $percent_Ha_maize = (($tot_Ha_maize_all/$tot_Ha_all)*100);
        $percent_i6_maize_N = (($m_N/$tot_Ha_all)*100);
        $percent_i6_maize_W = (($m_W/$tot_Ha_all)*100);
        $percent_i6_maize_E = (($m_E/$tot_Ha_all)*100);
        $percent_i6_maize_C = (($m_C/$tot_Ha_all)*100);

        $percent_Ha_beans = (($tot_Ha_beans_all/$tot_Ha_all)*100);
        $percent_i6_beans_N = (($b_N/$tot_Ha_all)*100);
        $percent_i6_beans_W = (($b_W/$tot_Ha_all)*100);
        $percent_i6_beans_E = (($b_E/$tot_Ha_all)*100);
        $percent_i6_beans_C = (($b_C/$tot_Ha_all)*100);

        $arr_coffee_all = ''.$percent_i6_coffee_N.','.$percent_i6_coffee_W.','.$percent_i6_coffee_E.','.$percent_i6_coffee_C.'';
        $arr_maize_all = ''.$percent_i6_maize_N.','.$percent_i6_maize_W.','.$percent_i6_maize_E.','.$percent_i6_maize_C.'';
        $arr_beans_all = ''.$percent_i6_beans_N.','.$percent_i6_beans_W.','.$percent_i6_beans_E.','.$percent_i6_beans_C.'';

        $percent_i6_coffee_All = $percent_Ha_coffee;
        $percent_i6_maize_All = $percent_Ha_maize;
        $percent_i6_beans_All = $percent_Ha_beans;

    ?>
    $(function () {

        var colors = Highcharts.getOptions().colors,
            categories = ['<?=$crop_C; ?>', '<?=$crop_M; ?>', '<?=$crop_B; ?>'],
            name = 'Hectares under production',
            data = [{
                y: <?=$percent_i6_coffee_All; ?>,
                color: colors[3],
                drilldown: {
                    name: '<?=$crop_C; ?>',
                    categories: ['<?=$crop_C.'-'.$reg_N; ?>', '<?=$crop_C.'-'.$reg_W; ?>', '<?=$crop_C.'-'.$reg_E; ?>', '<?=$crop_C.'-'.$reg_C; ?>'],
                    data: [<?=$arr_coffee_all; ?>],
                    color: colors[3]
                }
            }, {
                y: <?=$percent_i6_maize_All; ?>,
                color: colors[4],
                drilldown: {
                    name: '<?=$crop_M; ?>',
                    categories: ['<?=$crop_M.'-'.$reg_N; ?>', '<?=$crop_M.'-'.$reg_W; ?>', '<?=$crop_M.'-'.$reg_E; ?>', '<?=$crop_M.'-'.$reg_C; ?>'],
                    data: [<?=$arr_maize_all; ?>],
                    color: colors[4]
                }
            }, {
                y: <?=$percent_i6_beans_All; ?>,
                color: colors[5],
                drilldown: {
                    name: '<?=$crop_B; ?>',
                    categories: ['<?=$crop_B.'-'.$reg_N; ?>', '<?=$crop_B.'-'.$reg_W; ?>', '<?=$crop_B.'-'.$reg_E; ?>', '<?=$crop_B.'-'.$reg_C; ?>'],
                    data: [<?=$arr_beans_all; ?>],
                    color: colors[5]
                }
            }];


        // Build the data arrays
        var hectaresData = [];
        var regionalData = [];
        for (var i = 0; i < data.length; i++) {

            // add browser data
            hectaresData.push({
                name: categories[i],
                y: data[i].y,
                color: data[i].color
            });

            // add version data
            for (var j = 0; j < data[i].drilldown.data.length; j++) {
                var brightness = 0.2 - (j / data[i].drilldown.data.length) / 5;
                regionalData.push({
                    name: data[i].drilldown.categories[j],
                    y: data[i].drilldown.data[j],
                    color: Highcharts.Color(data[i].color).brighten(brightness).get()
                });
            }
        }

        // Create the chart
        $('#indicator_six').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 30
                }
            },
            title: {
                text: ''
            },
            yAxis: {
                title: {
                    text: '%ge Ha under production'
                }
            },
            plotOptions: {
                pie: {
                    shadow: false,
                    center: ['50%', '50%'],
                    depth: 30
                }


            },
            tooltip: {

                pointFormat: '%ge Ha under production: {point.y:.0f}%'

            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Hectares under production',
                data: hectaresData,
                size: '55%',
                dataLabels: {
                    formatter: function () {
                        return this.y > 5 ? this.point.name : null;
                    },
                    color: '#00215A',
                    distance: -30
                }
            }, {
                name: '%ge Ha under production By Region',
                data: regionalData,
                size: '75%',
                innerSize: '55%',

                dataLabels: {
                    formatter: function () {
                        // display only if larger than 1

                        return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + Highcharts.numberFormat(this.y,0) + '%' : null;
                    }
                }
            }]
        });
    });


</script>

<!--indicator seven_graph Technologies Adopted
<script type="text/javascript">
    <?php
        $reg_N = 'North';
        $reg_W = 'West';
        $reg_E = 'East';
        $reg_C = 'Central';
        $arr_reg_All = " '".$reg_N."', '".$reg_W."', '".$reg_E."', '".$reg_C."' ";
        foreach ($data_get_i7_ImprovedSeed_N as $row) {
            $i7_ImprovedSeed_N = ( $row->improvedSeed );
        }
        foreach ($data_get_i7_ImprovedSeed_W as $row) {
            $i7_ImprovedSeed_W = ( $row->improvedSeed );
        }
        foreach ($data_get_i7_ImprovedSeed_E as $row) {
            $i7_ImprovedSeed_E = ( $row->improvedSeed );
        }

        foreach ($data_get_i7_ImprovedSeed_C as $row) {
            $i7_ImprovedSeed_C = ( $row->improvedSeed );
        }


        foreach ($data_get_i7_Fertilizer_N as $row) {
            $i7_Fertilizer_N = ( $row->Fertilizer );
        }
        foreach ($data_get_i7_Fertilizer_W as $row) {
            $i7_Fertilizer_W = ( $row->Fertilizer );
        }
        foreach ($data_get_i7_Fertilizer_E as $row) {
            $i7_Fertilizer_E = ( $row->Fertilizer );
        }

        foreach ($data_get_i7_Fertilizer_C as $row) {
            $i7_Fertilizer_C = ( $row->Fertilizer );
        }


        foreach ($data_get_i7_Chemical_N as $row) {
            $i7_Chemical_N = ( $row->Chemical );
        }
        foreach ($data_get_i7_Chemical_W as $row) {
            $i7_Chemical_W = ( $row->Chemical );
        }
        foreach ($data_get_i7_Chemical_E as $row) {
            $i7_Chemical_E = ( $row->Chemical );
        }

        foreach ($data_get_i7_Chemical_C as $row) {
            $i7_Chemical_C = ( $row->Chemical );
        }


        foreach ($data_get_i7_ManagementPractices_N as $row) {
            $i7_ManagementPractices_N = ( $row->ManagementPractices );
        }
        foreach ($data_get_i7_ManagementPractices_W as $row) {
            $i7_ManagementPractices_W = ( $row->ManagementPractices );
        }
        foreach ($data_get_i7_ManagementPractices_E as $row) {
            $i7_ManagementPractices_E = ( $row->ManagementPractices );
        }

        foreach ($data_get_i7_ManagementPractices_C as $row) {
            $i7_ManagementPractices_C = ( $row->ManagementPractices );
        }

        foreach ($data_get_i7_Machinery_N as $row) {
            $i7_Machinery_N = ( $row->Machinery );
        }
        foreach ($data_get_i7_Machinery_W as $row) {
            $i7_Machinery_W = ( $row->Machinery );
        }
        foreach ($data_get_i7_Machinery_E as $row) {
            $i7_Machinery_E = ( $row->Machinery );
        }

        foreach ($data_get_i7_Machinery_C as $row) {
            $i7_Machinery_C = ( $row->Machinery );
        }




        $arr_ImprovedSeed_All = ''.$i7_ImprovedSeed_N.','.$i7_ImprovedSeed_W.','.$i7_ImprovedSeed_E.','.$i7_ImprovedSeed_C.'';
        $arr_Fertilizer_All = ''.$i7_Fertilizer_N.','.$i7_Fertilizer_W.','.$i7_Fertilizer_E.','.$i7_Fertilizer_C.'';
        $arr_Chemical_All = ''.$i7_Chemical_N.','.$i7_Chemical_W.','.$i7_Chemical_E.','.$i7_Chemical_C.'';
        $arr_ManagementPractices_All = ''.$i7_ManagementPractices_N.','.$i7_ManagementPractices_W.','.$i7_ManagementPractices_E.','.$i7_ManagementPractices_C.'';
        $arr_Machinery_All = ''.$i7_Machinery_N.','.$i7_Machinery_W.','.$i7_Machinery_E.','.$i7_Machinery_C.'';

        $i7_ImprovedSeed_sum = ($i7_ImprovedSeed_N + $i7_ImprovedSeed_W + $i7_ImprovedSeed_E + $i7_ImprovedSeed_C);
        $i7_Fertilizer_sum = ($i7_Fertilizer_N + $i7_Fertilizer_W + $i7_Fertilizer_E + $i7_Fertilizer_C);
        $i7_Chemical_sum = ($i7_Chemical_N + $i7_Chemical_W + $i7_Chemical_E + $i7_Chemical_C);
        $i7_ManagementPractices_sum = ($i7_ManagementPractices_N + $i7_ManagementPractices_W + $i7_ManagementPractices_E + $i7_ManagementPractices_C);
        $i7_Machinery_sum = ($i7_Machinery_N + $i7_Machinery_W + $i7_Machinery_E + $i7_Machinery_C);



     ?>
    $(function () {
        Highcharts.setOptions({
            lang: {
                thousandsSep: ','
            }
        });

        var colors = Highcharts.getOptions().colors,
            categories = ['Improved seed','Fertilizer', 'Chemical Use', 'Management Practices', 'Machinery Use'],
        name = 'Technologies adopted',
            data = [{
                y: <?=$i7_ImprovedSeed_sum; ?>,
                color: colors[0],
                drilldown: {
                    name: 'Improved seed By Region',
                    categories: [<?=$arr_reg_All; ?>],
                    data: [<?=$arr_ImprovedSeed_All; ?>],
                    color: colors[0]
                }
            }, {
                y: <?=$i7_Fertilizer_sum; ?>,
                color: colors[1],
                drilldown: {
                    name: 'Fertilizer By Region',
                    categories: [<?=$arr_reg_All; ?>],
                    data: [<?=$arr_Fertilizer_All; ?>],
                    color: colors[1]
                }
            }, {
                y: <?=$i7_Chemical_sum; ?>,
                color: colors[2],
                drilldown: {
                    name: 'Chemical Use By Region',
                    categories: [<?=$arr_reg_All; ?>],
                    data: [<?=$arr_Chemical_All; ?>],
                    color: colors[2]
                }
            },
                {
                    y: <?=$i7_ManagementPractices_sum; ?>,
                    color: colors[3],
                    drilldown: {
                        name: 'Management Practices By Region',
                        categories: [<?=$arr_reg_All; ?>],
                        data: [<?=$arr_ManagementPractices_All; ?>],
                        color: colors[3]
                    }
                },{
                    y: <?=$i7_Machinery_sum; ?>,
                    color: colors[4],
                    drilldown: {
                        name: 'Machinery Use By Region',
                        categories: [<?=$arr_reg_All; ?>],
                        data: [<?=$arr_Machinery_All; ?>],
                        color: colors[4]
                    }
                }];

        function setChart(name, categories, data, color) {
            chart.xAxis[0].setCategories(categories, false);
            chart.series[0].remove(false);
            chart.addSeries({
                name: name,
                data: data,
                color: color || 'white'
            }, false);
            chart.redraw();
        }

        var chart = $('#indicator_seven').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Click the columns to view Technologies Adopted by Region. Click again to view Technologies Adopted.'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Technologies Adopted'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function () {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[1],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function () {
                            return Highcharts.numberFormat(this.y, 0, '.') + '';
                        }
                    }
                }
            },
            tooltip: {
                formatter: function () {
                    var point = this.point,
                        s = this.x + ':<b>' + Highcharts.numberFormat(this.y, 0, '.') + ' Surveyed Farmers</b><br/>';
                    if (point.drilldown) {
                        s += 'Click to view ' + point.category + ' Technologies Adopted By region';
                    } else {
                        s += 'Click to return to Technologies Adopted';
                    }
                    return s;
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: name,
                data: data,
                color: 'white'
            }],
            exporting: {
                enabled: false
            }
        })
            .highcharts(); // return chart
    });


</script>-->

<!--indicator eight_graph-->
<script type="text/javascript">
    $(function () {
        <?php
            foreach ($data_indicator8_Micro as $row) {

                $Micro2013 = $row->numYr1;
                $Micro2014 = $row->numYr2;
                $Micro2015 = $row->numYr3;
                $Micro2016 = $row->numYr4;
                $Micro2017 = $row->numYr5;
                $Micro2018 = $row->numYr6;
            }
        ?>

        <?php
            foreach ($data_indicator8_Small as $row) {

                $Small2013 = $row->numYr1;
                $Small2014 = $row->numYr2;
                $Small2015 = $row->numYr3;
                $Small2016 = $row->numYr4;
                $Small2017 = $row->numYr5;
                $Small2018 = $row->numYr6;
            }
        ?>

        <?php
            foreach ($data_indicator8_Medium as $row) {

                $Medium2013 = $row->numYr1;
                $Medium2014 = $row->numYr2;
                $Medium2015 = $row->numYr3;
                $Medium2016 = $row->numYr4;
                $Medium2017 = $row->numYr5;
                $Medium2018 = $row->numYr6;
            }
        ?>
        // Create the chart
        $('#indicator_eight').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total Loan Accessed'
            },
            xAxis: {
                type: 'category'
            },

            legend: {
                enabled: true
            },

            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'blue'
                        }

                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Micro',
                //colorByPoint: true,
                color: '#9E0825',
                data: [{
                    name: '2013',
                    y: <?=$Micro2013; ?>,
                    color: '#9E0825',
                    drilldown: 'north-2013'
                }, {
                    name: '2014',
                    y: <?=$Micro2014; ?>,
                    drilldown: 'north-2014'
                }, {
                    name: '2015',
                    y: <?=$Micro2015; ?>,
                    drilldown: 'north-2015'
                }, {
                    name: '2016',
                    y: <?=$Micro2016; ?>,
                    drilldown: 'north-2016'
                }, {
                    name: '2017',
                    y: <?=$Micro2017; ?>,
                    drilldown: 'north-2017'
                }, {
                    name: '2018',
                    y: <?=$Micro2018; ?>,
                    drilldown: 'north-2018'
                }]
            }, {
                name: 'Small',
                //colorByPoint: true,
                color: '#001E55',
                data: [{
                    name: '2013',
                    y: <?=$Small2013; ?>,
                    color: '#001E55',
                    drilldown: 'west-2013'
                }, {
                    name: '2014',
                    y: <?=$Small2014; ?>,
                    drilldown: 'west-2014'
                }, {
                    name: '2015',
                    y: <?=$Small2015; ?>,
                    drilldown: 'west-2015'
                }, {
                    name: '2016',
                    y: <?=$Small2016; ?>,
                    drilldown: 'west-2016'
                }, {
                    name: '2017',
                    y: <?=$Small2017; ?>,
                    drilldown: 'west-2017'
                }, {
                    name: '2018',
                    y: <?=$Small2018; ?>,
                    drilldown: 'west-2018'
                }]
            }, {
                name: 'Medium',
                //colorByPoint: true,
                color: '#70BAD9',
                data: [{
                    name: '2013',
                    y: <?=$Medium2013; ?>,
                    color: '#70BAD9',
                    drilldown: 'central-2013'
                }, {
                    name: '2014',
                    y: <?=$Medium2014; ?>,
                    drilldown: 'central-2014'
                }, {
                    name: '2015',
                    y: <?=$Medium2015; ?>,
                    drilldown: 'central-2015'
                }, {
                    name: '2016',
                    y: <?=$Medium2016; ?>,
                    drilldown: 'central-2016'
                }, {
                    name: '2017',
                    y: <?=$Medium2017; ?>,
                    drilldown: 'central-2017'
                }, {
                    name: '2018',
                    y: <?=$Medium2018; ?>,
                    drilldown: 'central-2018'
                }]
            }],
            drilldown: {
                _animation: {
                    duration: 2000
                },

                //Start of drill down
                series: [{
                    id: 'north-2013',
                    name: '2013',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'west-2013',
                    name: '2013',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'east-2013',
                    name: '2013',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'central-2013',
                    name: '2013',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'north-2014',
                    name: '2014',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'west-2014',
                    name: '2014',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'east-2014',
                    name: '2014',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'central-2014',
                    name: '2014',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                },


                    {
                        id: 'north-2015',
                        name: '2015',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'west-2015',
                        name: '2015',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'east-2015',
                        name: '2015',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'central-2015',
                        name: '2015',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    },


                    {
                        id: 'north-2016',
                        name: '2016',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'west-2016',
                        name: '2016',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'east-2016',
                        name: '2016',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'central-2016',
                        name: '2016',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    },


                    {
                        id: 'north-2017',
                        name: '2017',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'west-2017',
                        name: '2017',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'east-2017',
                        name: '2017',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'central-2017',
                        name: '2017',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    },


                    {
                        id: 'north-2018',
                        name: '2018',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'west-2018',
                        name: '2018',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'east-2018',
                        name: '2018',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'central-2018',
                        name: '2018',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }]

                //End of Drill Downs

            }
        })
    });

</script>

<!--indicator nine_graph-->
<script type="text/javascript">

    $(function () {
        <?php
            foreach ($data_indicator9_North as $row) {

                $North2013 = $row->North2013;
                $North2014 = $row->North2014;
                $North2015 = $row->North2015;
                $North2016 = $row->North2016;
                $North2017 = $row->North2017;
                $North2018 = $row->North2018;
            }
        ?>
        <?php
            foreach ($data_indicator9_Central as $row) {

                $Central2013 = $row->Central2013;
                $Central2014 = $row->Central2014;
                $Central2015 = $row->Central2015;
                $Central2016 = $row->Central2016;
                $Central2017 = $row->Central2017;
                $Central2018 = $row->Central2018;
            }
        ?>
        <?php
            foreach ($data_indicator9_East as $row) {

                $East2013 = $row->East2013;
                $East2014 = $row->East2014;
                $East2015 = $row->East2015;
                $East2016 = $row->East2016;
                $East2017 = $row->East2017;
                $East2018 = $row->East2018;
            }
        ?>
        <?php
            foreach ($data_indicator9_West as $row) {

                $West2013 = $row->West2013;
                $West2014 = $row->West2014;
                $West2015 = $row->West2015;
                $West2016 = $row->West2016;
                $West2017 = $row->West2017;
                $West2018 = $row->West2018;
            }
        ?>
        $('#indicator_nine').highcharts({
            title: {
                text: 'Value Of Investment'
            },
            xAxis: {
                categories: ['North', 'Central', 'East', 'West']
            },
            labels: {
                items: [{
                    html: '',
                    style: {
                        right: '10px',
                        top: '18px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            credits: {
                enabled: false
            },
            series: [{
                type: 'column',
                name: '2013',
                data: [<?=$North2013; ?>, <?=$Central2013; ?>, <?=$East2013; ?>, <?=$West2013; ?>]
            }, {
                type: 'column',
                name: '2014',
                data: [<?=$North2014; ?>, <?=$Central2014; ?>, <?=$East2014; ?>, <?=$West2014; ?>]
            }, {
                type: 'column',
                name: '2015',
                data: [<?=$North2015; ?>, <?=$Central2015; ?>, <?=$East2015; ?>, <?=$West2015; ?>]
            }, {
                type: 'column',
                name: '2016',
                data: [<?=$North2016; ?>, <?=$Central2016; ?>, <?=$East2016; ?>, <?=$West2016; ?>]
            }, {
                type: 'column',
                name: '2017',
                data: [<?=$North2017; ?>, <?=$Central2017; ?>, <?=$East2017; ?>, <?=$West2017; ?>]
            }, {
                type: 'column',
                name: '2018',
                data: [<?=$North2018; ?>, <?=$Central2018; ?>, <?=$East2018; ?>, <?=$West2018; ?>]
            }, {
                type: 'pie',
                name: 'Total Illegal Earnings ',
                data: [{
                    name: 'Kampala',
                    y: 97847.27,
                    color: Highcharts.getOptions().colors[0] // Kampala's color
                }, {
                    name: 'Nairobi',
                    y: 5655.52556,
                    color: Highcharts.getOptions().colors[1] // Nairobi's color
                }, {
                    name: 'Dar es Salaam',
                    y: 19009.72,
                    color: Highcharts.getOptions().colors[1] // Dar es Salaam's color
                }, {
                    name: 'Kigali',
                    y: 18490.14,
                    color: Highcharts.getOptions().colors[2] // Kigali's color
                }],
                center: [1000, 80],
                size: 100,
                showInLegend: false,
                dataLabels: {
                    enabled: true,
                }
            }]
        });
    });
</script>


<!--indicator ten_graph input sales-->
<script type="text/javascript">
    $(function () {
        <?php
        //---------region data set-------------
            foreach ($data_IndicatorTenRegionCentral as $row) {

                $inputsSoldByChemicalsCentral = $row->inputsSoldByChemicals;
                $inputsSoldByFarmImplementsCentral = $row->inputsSoldByFarmImplements;
                $inputsSoldByFertilizersCentral = $row->inputsSoldByFertilizers;
                $inputsSoldByHerbicidesCentral = $row->inputsSoldByHerbicides;
                $inputsSoldByOthersCentral = $row->inputsSoldByOthers;
                $inputsSoldBySeedsCentral = $row->inputsSoldBySeeds;
            }



             foreach ($data_IndicatorTenRegionNorth as $row) {

                $inputsSoldByChemicalsNorth = $row->inputsSoldByChemicals;
                $inputsSoldByFarmImplementsNorth = $row->inputsSoldByFarmImplements;
                $inputsSoldByFertilizersNorth = $row->inputsSoldByFertilizers;
                $inputsSoldByHerbicidesNorth = $row->inputsSoldByHerbicides;
                $inputsSoldByOthersNorth = $row->inputsSoldByOthers;
                $inputsSoldBySeedsNorth = $row->inputsSoldBySeeds;
            }

             foreach ($data_IndicatorTenRegionEast as $row) {

                $inputsSoldByChemicalsEast = $row->inputsSoldByChemicals;
                $inputsSoldByFarmImplementsEast = $row->inputsSoldByFarmImplements;
                $inputsSoldByFertilizersEast = $row->inputsSoldByFertilizers;
                $inputsSoldByHerbicidesEast = $row->inputsSoldByHerbicides;
                $inputsSoldByOthersEast = $row->inputsSoldByOthers;
                $inputsSoldBySeedsEast = $row->inputsSoldBySeeds;
            }

             foreach ($data_IndicatorTenRegionWest as $row) {

                $inputsSoldByChemicalsWest = $row->inputsSoldByChemicals;
                $inputsSoldByFarmImplementsWest = $row->inputsSoldByFarmImplements;
                $inputsSoldByFertilizersWest = $row->inputsSoldByFertilizers;
                $inputsSoldByHerbicidesWest = $row->inputsSoldByHerbicides;
                $inputsSoldByOthersWest = $row->inputsSoldByOthers;
                $inputsSoldBySeedsWest = $row->inputsSoldBySeeds;
            }

        ?>

        <?php
        //--------------district data sets--------
            foreach ($data_IndicatorTenDistrict as $row) {

                   $districtInputsSoldByChemicals = $row->inputsSoldByChemicals;
                $districtInputsSoldByFarmImplements = $row->inputsSoldByFarmImplements;
                $districtInputsSoldByFertilizers = $row->inputsSoldByFertilizers;
                $districtInputsSoldByHerbicides = $row->inputsSoldByHerbicides;
                $districtInputsSoldByOthers = $row->inputsSoldByOthers;
                $districtInputsSoldBySeeds = $row->inputsSoldBySeeds;
            }
        ?>


        // Create the chart
        $('#indicator_ten').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Input Sales'
            },
            xAxis: {
                type: 'category'
            },

            legend: {
                enabled: true
            },

            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'blue'
                        }

                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Central',
                //colorByPoint: true,
                color: '#9E0825',
                data: [{
                    name: 'Chemicals',
                    y: <?=$inputsSoldByChemicalsCentral; ?>,
                    //color: '#9E0825',
                    drilldown: 'Chemicals Sold per Districts'
                }, {
                    name: 'Farm Implements',
                    y: <?=$inputsSoldByFarmImplementsCentral; ?>,
                    drilldown: 'Farm Implements Sold per Districts'
                }, {
                    name: 'Fertilizers',
                    y: <?=$inputsSoldByFertilizersCentral; ?>,
                    drilldown: 'Fertilizers sold per district'
                }, {
                    name: 'Herbicides',
                    y: <?=$inputsSoldByHerbicidesCentral; ?>,
                    drilldown: 'Herbicides sold per district'
                }
                    , {
                        name: 'Seeds',
                        y: <?=$inputsSoldBySeedsCentral; ?>,
                        drilldown: 'Seeds sold per district'
                    }, {
                        name: 'Others',
                        y: <?=$inputsSoldByOthersCentral; ?>,
                        drilldown: 'Others sold per district'
                    }]
            }, {
                name: 'North',
                //colorByPoint: true,
                color: '#001E55',
                data: [{
                    name: 'Chemicals',
                    y: <?=$inputsSoldByChemicalsNorth; ?>,
                    //color: '#9E0825',
                    drilldown: 'Chemicals Sold per Districts'
                }, {
                    name: 'Farm Implements',
                    y: <?=$inputsSoldByFarmImplementsNorth; ?>,
                    drilldown: 'Farm Implements Sold per Districts'
                }, {
                    name: 'Fertilizers',
                    y: <?=$inputsSoldByFertilizersNorth; ?>,
                    drilldown: 'Fertilizers sold per district'
                }, {
                    name: 'Herbicides',
                    y: <?=$inputsSoldByHerbicidesNorth; ?>,
                    drilldown: 'Herbicides sold per district'
                }
                    , {
                        name: 'Seeds',
                        y: <?=$inputsSoldBySeedsNorth; ?>,
                        drilldown: 'Seeds sold per district'
                    }, {
                        name: 'Others',
                        y: <?=$inputsSoldByOthersNorth; ?>,
                        drilldown: 'Others sold per district'
                    }]
            }, {
                name: 'East',
                //colorByPoint: true,
                color: '#cc00ff',
                data: [{
                    name: 'Chemicals',
                    y: <?=$inputsSoldByChemicalsEast; ?>,
                    //color: '#9E0825',
                    drilldown: 'Chemicals Sold per Districts'
                }, {
                    name: 'Farm Implements',
                    y: <?=$inputsSoldByFarmImplementsEast; ?>,
                    drilldown: 'Farm Implements Sold per Districts'
                }, {
                    name: 'Fertilizers',
                    y: <?=$inputsSoldByFertilizersEast; ?>,
                    drilldown: 'Fertilizers sold per district'
                }, {
                    name: 'Herbicides',
                    y: <?=$inputsSoldByHerbicidesEast; ?>,
                    drilldown: 'Herbicides sold per district'
                }
                    , {
                        name: 'Seeds',
                        y: <?=$inputsSoldBySeedsEast; ?>,
                        drilldown: 'Seeds sold per district'
                    }, {
                        name: 'Others',
                        y: <?=$inputsSoldByOthersEast; ?>,
                        drilldown: 'Others sold per district'
                    }]
            }, {
                name: 'West',
                //colorByPoint: true,
                color: '#669933',
                data: [{
                    name: 'Chemicals',
                    y: <?=$inputsSoldByChemicalsWest; ?>,
                    //color: '#9E0825',
                    drilldown: 'Chemicals Sold per Districts'
                }, {
                    name: 'Farm Implements',
                    y: <?=$inputsSoldByFarmImplementsWest; ?>,
                    drilldown: 'Farm Implements Sold per Districts'
                }, {
                    name: 'Fertilizers',
                    y: <?=$inputsSoldByFertilizersWest; ?>,
                    drilldown: 'Fertilizers sold per district'
                }, {
                    name: 'Herbicides',
                    y: <?=$inputsSoldByHerbicidesWest; ?>,
                    drilldown: 'Herbicides sold per district'
                }
                    , {
                        name: 'Seeds',
                        y: <?=$inputsSoldBySeedsWest; ?>,
                        drilldown: 'Seeds sold per district'
                    }, {
                        name: 'Others',
                        y: <?=$inputsSoldByOthersWest; ?>,
                        drilldown: 'Others sold per district'
                    }]
            }],
            drilldown: {
                _animation: {
                    duration: 2000
                },

                //Start of drill down
                series: [{
                    id: 'north-2013',
                    name: '2013',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'west-2013',
                    name: '2013',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'east-2013',
                    name: '2013',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'central-2013',
                    name: '2013',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'north-2014',
                    name: '2014',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'west-2014',
                    name: '2014',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'east-2014',
                    name: '2014',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                }, {
                    id: 'central-2014',
                    name: '2014',
                    data: [
                        ['Micro', 0],
                        ['Small', 0],
                        ['Medium', 0]
                    ]
                },


                    {
                        id: 'north-2015',
                        name: '2015',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'west-2015',
                        name: '2015',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'east-2015',
                        name: '2015',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'central-2015',
                        name: '2015',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    },


                    {
                        id: 'north-2016',
                        name: '2016',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'west-2016',
                        name: '2016',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'east-2016',
                        name: '2016',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'central-2016',
                        name: '2016',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    },


                    {
                        id: 'north-2017',
                        name: '2017',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'west-2017',
                        name: '2017',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'east-2017',
                        name: '2017',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'central-2017',
                        name: '2017',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    },


                    {
                        id: 'north-2018',
                        name: '2018',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'west-2018',
                        name: '2018',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'east-2018',
                        name: '2018',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }, {
                        id: 'central-2018',
                        name: '2018',
                        data: [
                            ['Micro', 0],
                            ['Small', 0],
                            ['Medium', 0]
                        ]
                    }]

                //End of Drill Downs

            }
        })
    });

</script>

<!--indicator eleven_graph-->


<!--indicator twelve_graph market prices-->
<script type="text/javascript">
    $(function () {
        <?php
        //---------central region data set-------------
            foreach ($data_IndicatorTwelveRegionCentral as $row) {

                $volMaizePurchasedCentral = $row->volMaizePurchased;
                $volBeansPurchasedCentral = $row->volBeansPurchased;
                $volCoffeePurchasedCentral = $row->volCoffeePurchased;

            }
            //--------North region-----------------------
             foreach ($data_IndicatorTwelveRegionNorth as $row) {

                $volMaizePurchasedNorth = $row->volMaizePurchased;
                $volBeansPurchasedNorth = $row->volBeansPurchased;
                $volCoffeePurchasedNorth = $row->volCoffeePurchased;

            }

            //---------East region data set-------------
            foreach ($data_IndicatorTwelveRegionEast as $row) {

                $volMaizePurchasedEast = $row->volMaizePurchased;
                $volBeansPurchasedEast = $row->volBeansPurchased;
                $volCoffeePurchasedEast = $row->volCoffeePurchased;

            }
            //--------West region-----------------------
             foreach ($data_IndicatorTwelveRegionWest as $row) {

                $volMaizePurchasedWest = $row->volMaizePurchased;
                $volBeansPurchasedWest = $row->volBeansPurchased;
                $volCoffeePurchasedWest = $row->volCoffeePurchased;

            }






        ?>
    });

        <?php
        //--------------district data sets--------
            /* foreach ($data_IndicatorTenDistrict as $row) {

                   $districtInputsSoldByChemicals = $row->inputsSoldByChemicals;
                $districtInputsSoldByFarmImplements = $row->inputsSoldByFarmImplements;
                $districtInputsSoldByFertilizers = $row->inputsSoldByFertilizers;
                $districtInputsSoldByHerbicides = $row->inputsSoldByHerbicides;
                $districtInputsSoldByOthers = $row->inputsSoldByOthers;
                $districtInputsSoldBySeeds = $row->inputsSoldBySeeds;
            } */
        ?>


    //     // Create the chart
    //     $('#indicator_twelve').highcharts({
    //         chart: {
    //             type: 'column'
    //         },
    //         title: {
    //             text: 'Market Prices per Kilogram'
    //         },
    //         xAxis: {
    //             type: 'category'
    //         },

    //         legend: {
    //             enabled: true
    //         },

    //         plotOptions: {
    //             series: {
    //                 borderWidth: 0,
    //                 dataLabels: {
    //                     enabled: true,

    //                     style: {
    //                         fontWeight: 'bold',
    //                         color: (Highcharts.theme && Highcharts.theme.textColor) || 'blue'
    //                     },
    //                     formatter: function () {
    //                         return Highcharts.numberFormat(this.y, 0, '.') + '';
    //                     },

    //                 }
    //             }
    //         },
    //         tooltip: {
    //             formatter: function () {
    //                 var point = this.point,
    //                     s = Highcharts.numberFormat(this.y, 0, '.') + ' .Shs</b><br/>';
    //                 if (point.drilldown) {
    //                     s += 'Click to view ' + point.category + ' Market Prices By District';
    //                 } else {
    //                     s += 'Click to return to Market Prices By Region';
    //                 }
    //                 return s;
    //             }
    //         },
    //         credits: {
    //             enabled: false
    //         },
    //         series: [{
    //             name: 'Central',
    //             //colorByPoint: true,
    //             color: '#9E0825',
    //             data: [{
    //                 name: 'Maize',
    //                 y: <?=$volMaizePurchasedCentral; ?>,
    //                 // color: '#9E0825',
    //                 drilldown: 'Maize Sold per Districts'
    //             }, {
    //                 name: 'Beans',
    //                 y: <?=$volBeansPurchasedCentral; ?>,
    //                 //color: '#4572A7',
    //                 drilldown: 'Beans Sold per Districts'
    //             }, {
    //                 name: 'Coffee',
    //                 y: <?=$volCoffeePurchasedCentral; ?>,
    //                 //color: '#669933',
    //                 drilldown: 'Coffee sold per district'
    //             }]
    //         }, {
    //             name: 'North',
    //             //colorByPoint: true,
    //             color: '#001E55',
    //             data: [{
    //                 name: 'Maize',
    //                 y: <?=$volMaizePurchasedNorth; ?>,
    //                 //color: '#9E0825',
    //                 drilldown: 'Maize Sold per Districts'
    //             }, {
    //                 name: 'Beans',
    //                 y: <?=$volBeansPurchasedNorth; ?>,
    //                 //color: '#4572A7',
    //                 drilldown: 'Beans Sold per Districts'
    //             }, {
    //                 name: 'Coffee',
    //                 y: <?=$volCoffeePurchasedNorth; ?>,
    //                 //color: '#669933',
    //                 drilldown: 'Coffee sold per district'
    //             }]
    //         },

    //             {
    //                 name: 'East',
    //                 //colorByPoint: true,
    //                 color: '#4572A7',
    //                 data: [{
    //                     name: 'Maize',
    //                     y: <?=$volMaizePurchasedEast; ?>,
    //                     // color: '#9E0825',
    //                     drilldown: 'Maize Sold per Districts'
    //                 }, {
    //                     name: 'Beans',
    //                     y: <?=$volBeansPurchasedEast; ?>,
    //                     //color: '#4572A7',
    //                     drilldown: 'Beans Sold per Districts'
    //                 }, {
    //                     name: 'Coffee',
    //                     y: <?=$volCoffeePurchasedEast; ?>,
    //                     //color: '#669933',
    //                     drilldown: 'Coffee sold per district'
    //                 }]
    //             },
    //             {
    //                 name: 'West',
    //                 //colorByPoint: true,
    //                 color: '#669933',
    //                 data: [{
    //                     name: 'Maize',
    //                     y: <?=$volMaizePurchasedWest; ?>,
    //                     //color: '#9E0825',
    //                     drilldown: 'Maize Sold per Districts'
    //                 }, {
    //                     name: 'Beans',
    //                     y: <?=$volBeansPurchasedWest; ?>,
    //                     //color: '#4572A7',
    //                     drilldown: 'Beans Sold per Districts'
    //                 }, {
    //                     name: 'Coffee',
    //                     y: <?=$volCoffeePurchasedWest; ?>,
    //                     //color: '#669933',
    //                     drilldown: 'Coffee sold per district'
    //                 }]
    //             }


    //         ],
    //         drilldown: {
    //             _animation: {
    //                 duration: 2000
    //             },

    //             //Start of drill down
    //             series: [{
    //                 id: 'north-2013',
    //                 name: '2013',
    //                 data: [
    //                     ['Micro', 0],
    //                     ['Small', 0],
    //                     ['Medium', 0]
    //                 ]
    //             }, {
    //                 id: 'west-2013',
    //                 name: '2013',
    //                 data: [
    //                     ['Micro', 0],
    //                     ['Small', 0],
    //                     ['Medium', 0]
    //                 ]
    //             }, {
    //                 id: 'east-2013',
    //                 name: '2013',
    //                 data: [
    //                     ['Micro', 0],
    //                     ['Small', 0],
    //                     ['Medium', 0]
    //                 ]
    //             }, {
    //                 id: 'central-2013',
    //                 name: '2013',
    //                 data: [
    //                     ['Micro', 0],
    //                     ['Small', 0],
    //                     ['Medium', 0]
    //                 ]
    //             }, {
    //                 id: 'north-2014',
    //                 name: '2014',
    //                 data: [
    //                     ['Micro', 0],
    //                     ['Small', 0],
    //                     ['Medium', 0]
    //                 ]
    //             }, {
    //                 id: 'west-2014',
    //                 name: '2014',
    //                 data: [
    //                     ['Micro', 0],
    //                     ['Small', 0],
    //                     ['Medium', 0]
    //                 ]
    //             }, {
    //                 id: 'east-2014',
    //                 name: '2014',
    //                 data: [
    //                     ['Micro', 0],
    //                     ['Small', 0],
    //                     ['Medium', 0]
    //                 ]
    //             }, {
    //                 id: 'central-2014',
    //                 name: '2014',
    //                 data: [
    //                     ['Micro', 0],
    //                     ['Small', 0],
    //                     ['Medium', 0]
    //                 ]
    //             },


    //                 {
    //                     id: 'north-2015',
    //                     name: '2015',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'west-2015',
    //                     name: '2015',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'east-2015',
    //                     name: '2015',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'central-2015',
    //                     name: '2015',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 },


    //                 {
    //                     id: 'north-2016',
    //                     name: '2016',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'west-2016',
    //                     name: '2016',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'east-2016',
    //                     name: '2016',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'central-2016',
    //                     name: '2016',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 },


    //                 {
    //                     id: 'north-2017',
    //                     name: '2017',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'west-2017',
    //                     name: '2017',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'east-2017',
    //                     name: '2017',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'central-2017',
    //                     name: '2017',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 },


    //                 {
    //                     id: 'north-2018',
    //                     name: '2018',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'west-2018',
    //                     name: '2018',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'east-2018',
    //                     name: '2018',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }, {
    //                     id: 'central-2018',
    //                     name: '2018',
    //                     data: [
    //                         ['Micro', 0],
    //                         ['Small', 0],
    //                         ['Medium', 0]
    //                     ]
    //                 }]

    //             //End of Drill Downs

    //         }
    //     })
    // });

</script>


<!--indicator thirteen_graph Farmers by region-->
<script type="text/javascript">

    $(function () {
        <?php
            foreach ($data_get_i13_Farmers_N as $row) {

                $North = $row->FarmerRegion;
                
            }
        ?>
        <?php
            foreach ($data_get_i13_Farmers_C as $row) {

                $Central = $row->FarmerRegion;
                
            }
        ?>
        <?php
            foreach ($data_get_i13_Farmers_E as $row) {

                $East = $row->FarmerRegion;
                
            }
        ?>
        <?php
            foreach ($data_get_i13_Farmers_W as $row) {

                $West = $row->FarmerRegion;
               
            }
        ?>
        $('#indicator_thirteen').highcharts({
            title: {
                text: 'Number of Farmers By Region'
            },
            chart: {
                type: 'column'
            },
            xAxis: {
                 categories: [
                 'North',
                 'Central',
                 'East',
                 'West'

                 ]
            },
            yAxis: {
            min: 0,
            title: {
                text: 'Number of Farmers'
            }
            },
            legend: {
                enabled: true
            },

            labels: {
                items: [{
                    html: '',
                    style: {
                        right: '10px',
                        top: '18px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Region',
                data: [<?=$North; ?>,<?=$Central; ?>,<?=$East; ?>,<?=$West; ?>]
            }]
        });
    });
</script>

<!--indicator volume sold by region-->
<script type="text/javascript">

    $(function () {
        <?php
            foreach ($data_get_i3_VolumesPurchased_North as $row) {

                $North = $row->volumesPurchased;
                
            }

            foreach ($data_get_i3_VolumesPurchased_ValueNorth as $row2) {

                $North_Maize = $row2->MaizePurchased;
                $North_Beans = $row2->BeansPurchased;
                $North_Coffee = $row2->CoffeePurchased;
                
            }
        ?>
        <?php
            foreach ($data_get_i3_VolumesPurchased_Central as $row) {

                $Central = $row->volumesPurchased;
                
            }

            foreach ($data_get_i3_VolumesPurchased_ValueCentral as $row3) {

                $Central_Maize = $row3->MaizePurchased;
                $Central_Beans = $row3->BeansPurchased;
                $Central_Coffee = $row3->CoffeePurchased;
                
            }
        ?>
        <?php
            foreach ($data_get_i3_VolumesPurchased_East as $row) {

                $East = $row->volumesPurchased;
                
            }
            foreach ($data_get_i3_VolumesPurchased_ValueEast as $row4) {

                $East_Maize = $row4->MaizePurchased;
                $East_Beans = $row4->BeansPurchased;
                $East_Coffee = $row4->CoffeePurchased;
                
            }
        ?>
        <?php
            foreach ($data_get_i3_VolumesPurchased_West as $row) {

                $West = $row->volumesPurchased;
               
            }
            foreach ($data_get_i3_VolumesPurchased_ValueWest as $row5) {

                $West_Maize = $row5->MaizePurchased;
                $West_Beans = $row5->BeansPurchased;
                $West_Coffee = $row5->CoffeePurchased;
                
            }
        ?>
        $('#indicator_three_sold').highcharts({
            title: {
                text: 'Volumes Purchased by Traders'
            },
            chart: {
                type: 'column'
            },
            xAxis: {
                 type: 'category'
            },
            yAxis: {
            min: 0,
            title: {
                text: 'Volumes Purchased (MT)'
            }
            },
            legend: {
                enabled: true
            },

            labels: {
                items: [{
                    html: '',
                    style: {
                        right: '10px',
                        top: '18px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            tooltip: {
                formatter: function () {
                    var point = this.point,
                        s = Highcharts.numberFormat(this.y, 0, '.') +'<br/>';
                    if (point.drilldown) {
                        s += 'Click to view more By Value Chain';
                    }
                    return s;
                }
            },
            credits: {
                enabled: false
            },
            series: [
            {
                name: 'North',
                data:[{
                    name: 'North',
                    y: <?=$North; ?>,
                    drilldown: 'north-value'
                }
                 ]
                
            },

            {
                name: 'Central',
                data:[{
                    name: 'Central',
                    y: <?=$Central; ?>,
                    drilldown: 'central-value'
                }
                 ]
                
            },

            {
                name: 'East',
                data:[{
                    name: 'Region',
                    y: <?=$East; ?>,
                    drilldown: 'east-value'
                }
                 ]
            },

            {
                name: 'West',
                data:[{
                    name: 'Region',
                    y: <?=$West; ?>,
                    drilldown: 'west-value'
                }
                 ]
                
            },

            ],

            drilldown: {
                _animation: {
                    duration: 2000
                },

                //Start of drill down
                series: [
                {
                    id: 'north-value',
                    name: 'North',
                    data: [
                        ['Maize', <?=$North_Maize;?>],
                        ['Beans', <?=$North_Beans;?>],
                        ['Coffee', <?=$North_Coffee;?>]
                    ]
                },

                {
                    id: 'central-value',
                    name: 'Central',
                    data: [
                        ['Maize', <?=$Central_Maize;?>],
                        ['Beans', <?=$Central_Beans;?>],
                        ['Coffee', <?=$Central_Coffee;?>]
                    ]
                },

                {
                    id: 'east-value',
                    name: 'East',
                    data: [
                        ['Maize', <?=$East_Maize;?>],
                        ['Beans', <?=$East_Beans;?>],
                        ['Coffee', <?=$East_Coffee;?>]
                    ]
                },

                {
                    id: 'west-value',
                    name: 'West',
                    data: [
                        ['Maize', <?=$West_Maize;?>],
                        ['Beans', <?=$West_Beans;?>],
                        ['Coffee', <?=$West_Coffee;?>]
                    ]
                }
                ]
            }
        });
    });
</script>


<!--indicator value of partnership by region-->
<script type="text/javascript">

    $(function () {
        <?php
            foreach ($data_get_i2_Partnerships_N as $row) {

                $North = $row->valuePartnershipsRegion;
                
            }
        ?>
        <?php
            foreach ($data_get_i2_Partnerships_C as $row) {

                $Central = $row->valuePartnershipsRegion;
                
            }
        ?>
        <?php
            foreach ($data_get_i2_Partnerships_E as $row) {

                $East = $row->valuePartnershipsRegion;
                
            }
        ?>
        <?php
            foreach ($data_get_i2_Partnerships_W as $row) {

                $West = $row->valuePartnershipsRegion;
               
            }
        ?>
        $('#indicator_two_partnerships').highcharts({
            title: {
                text: 'Value of Partnerships'
            },
            chart: {
                type: 'column'
            },
            xAxis: {
                 categories: [
                 'North',
                 'Central',
                 'East',
                 'West'

                 ]
            },
            yAxis: {
            min: 0,
            title: {
                text: 'Value of Partnerships'
            }
            },
            legend: {
                enabled: true
            },

            labels: {
                items: [{
                    html: '',
                    style: {
                        right: '10px',
                        top: '18px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Region',
                data: [<?=$North; ?>,<?=$Central; ?>,<?=$East; ?>,<?=$West; ?>]
            }]
        });
    });
</script>


<script type="text/javascript">

    $(function () {
        

        <?php
        define("usd","2500");
            foreach ($dashindicatorIncreamentalFactor as $row) {

                $exFactorYr1 = $row->exFactorYr1;
                $exFactorYr2 = $row->exFactorYr2;
                $exFactorYr3 = $row->exFactorYr3;
                $exFactorYr4 = $row->exFactorYr4;
                $exFactorYr5 = $row->exFactorYr5;
                $exFactorYr6 = $row->exFactorYr6;

                
            }

        ?>


        <?php

            foreach ($dashindicatorIncreamentalSalesMaize_N as $row) {

                $NorthincrementalSalesMaizeYr1 = $exFactorYr1*(($row->incrementalSalesMaizeYr1)/usd);
                $NorthincrementalSalesMaizeYr2 = $exFactorYr2*(($row->incrementalSalesMaizeYr2)/usd);
                $NorthincrementalSalesMaizeYr3 = $exFactorYr3*(($row->incrementalSalesMaizeYr3)/usd);
                $NorthincrementalSalesMaizeYr4 = $exFactorYr4*(($row->incrementalSalesMaizeYr4)/usd);
                $NorthincrementalSalesMaizeYr5 = $exFactorYr5*(($row->incrementalSalesMaizeYr5)/usd);
                $NorthincrementalSalesMaizeYr6 = $exFactorYr6*(($row->incrementalSalesMaizeYr6)/usd);

                
            }

            foreach ($dashindicatorIncreamentalSalesBeans_N as $row) {

                $NorthincrementalSalesBeansYr1 = $exFactorYr1*(($row->incrementalSalesBeansYr1)/usd);
                $NorthincrementalSalesBeansYr2 = $exFactorYr2*(($row->incrementalSalesBeansYr2)/usd);
                $NorthincrementalSalesBeansYr3 = $exFactorYr3*(($row->incrementalSalesBeansYr3)/usd);
                $NorthincrementalSalesBeansYr4 = $exFactorYr4*(($row->incrementalSalesBeansYr4)/usd);
                $NorthincrementalSalesBeansYr5 = $exFactorYr5*(($row->incrementalSalesBeansYr5)/usd);
                $NorthincrementalSalesBeansYr6 = $exFactorYr6*(($row->incrementalSalesBeansYr6)/usd);

               
            }
            foreach ($dashindicatorIncreamentalSalesCoffee_N as $row) {

                $NorthincrementalSalesCoffeeYr1 = $exFactorYr1*(($row->incrementalSalesCoffeeYr1)/usd);
                $NorthincrementalSalesCoffeeYr2 = $exFactorYr2*(($row->incrementalSalesCoffeeYr2)/usd);
                $NorthincrementalSalesCoffeeYr3 = $exFactorYr3*(($row->incrementalSalesCoffeeYr3)/usd);
                $NorthincrementalSalesCoffeeYr4 = $exFactorYr4*(($row->incrementalSalesCoffeeYr4)/usd);
                $NorthincrementalSalesCoffeeYr5 = $exFactorYr5*(($row->incrementalSalesCoffeeYr5)/usd);
                $NorthincrementalSalesCoffeeYr6 = $exFactorYr6*(($row->incrementalSalesCoffeeYr6)/usd);

                
            }
           
            $numYr1 = $NorthincrementalSalesCoffeeYr1+$NorthincrementalSalesBeansYr1+$NorthincrementalSalesMaizeYr1;
            $numYr2 = $NorthincrementalSalesCoffeeYr2+$NorthincrementalSalesBeansYr2+$NorthincrementalSalesMaizeYr2;
            $numYr3 = $NorthincrementalSalesCoffeeYr3+$NorthincrementalSalesBeansYr3+$NorthincrementalSalesMaizeYr3;
            $numYr4 = $NorthincrementalSalesCoffeeYr4+$NorthincrementalSalesBeansYr4+$NorthincrementalSalesMaizeYr4;
            $numYr5 = $NorthincrementalSalesCoffeeYr5+$NorthincrementalSalesBeansYr5+$NorthincrementalSalesMaizeYr5;
            $numYr6 = $NorthincrementalSalesCoffeeYr6+$NorthincrementalSalesBeansYr6+$NorthincrementalSalesMaizeYr6;
        ?>
        <?php

            foreach ($dashindicatorIncreamentalSalesMaize_C as $row) {

                $CentralincrementalSalesMaizeYr1 = $exFactorYr1*(($row->incrementalSalesMaizeYr1)/usd);
                $CentralincrementalSalesMaizeYr2 = $exFactorYr2*(($row->incrementalSalesMaizeYr2)/usd);
                $CentralincrementalSalesMaizeYr3 = $exFactorYr3*(($row->incrementalSalesMaizeYr3)/usd);
                $CentralincrementalSalesMaizeYr4 = $exFactorYr4*(($row->incrementalSalesMaizeYr4)/usd);
                $CentralincrementalSalesMaizeYr5 = $exFactorYr5*(($row->incrementalSalesMaizeYr5)/usd);
                $CentralincrementalSalesMaizeYr6 = $exFactorYr6*(($row->incrementalSalesMaizeYr6)/usd);
                
            }

            foreach ($dashindicatorIncreamentalSalesBeans_C as $row) {

                $CentralincrementalSalesBeansYr1 = $exFactorYr1*(($row->incrementalSalesBeansYr1)/usd);
                $CentralincrementalSalesBeansYr2 = $exFactorYr2*(($row->incrementalSalesBeansYr2)/usd);
                $CentralincrementalSalesBeansYr3 = $exFactorYr3*(($row->incrementalSalesBeansYr3)/usd);
                $CentralincrementalSalesBeansYr4 = $exFactorYr4*(($row->incrementalSalesBeansYr4)/usd);
                $CentralincrementalSalesBeansYr5 = $exFactorYr5*(($row->incrementalSalesBeansYr5)/usd);
                $CentralincrementalSalesBeansYr6 = $exFactorYr6*(($row->incrementalSalesBeansYr6)/usd);
                
            }
            foreach ($dashindicatorIncreamentalSalesCoffee_C as $row) {

                $CentralincrementalSalesCoffeeYr1 = $exFactorYr1*(($row->incrementalSalesCoffeeYr1)/usd);
                $CentralincrementalSalesCoffeeYr2 = $exFactorYr2*(($row->incrementalSalesCoffeeYr2)/usd);
                $CentralincrementalSalesCoffeeYr3 = $exFactorYr3*(($row->incrementalSalesCoffeeYr3)/usd);
                $CentralincrementalSalesCoffeeYr4 = $exFactorYr4*(($row->incrementalSalesCoffeeYr4)/usd);
                $CentralincrementalSalesCoffeeYr5 = $exFactorYr5*(($row->incrementalSalesCoffeeYr5)/usd);
                $CentralincrementalSalesCoffeeYr6 = $exFactorYr6*(($row->incrementalSalesCoffeeYr6)/usd);
                
            }

            $CentYr1 = $CentralincrementalSalesCoffeeYr1+$CentralincrementalSalesBeansYr1+$CentralincrementalSalesMaizeYr1;
            $CentYr2 = $CentralincrementalSalesCoffeeYr2+$CentralincrementalSalesBeansYr2+$CentralincrementalSalesMaizeYr2;
            $CentYr3 = $CentralincrementalSalesCoffeeYr3+$CentralincrementalSalesBeansYr3+$CentralincrementalSalesMaizeYr3;
            $CentYr4 = $CentralincrementalSalesCoffeeYr4+$CentralincrementalSalesBeansYr4+$CentralincrementalSalesMaizeYr4;
            $CentYr5 = $CentralincrementalSalesCoffeeYr5+$CentralincrementalSalesBeansYr5+$CentralincrementalSalesMaizeYr5;
            $CentYr6 = $CentralincrementalSalesCoffeeYr6+$CentralincrementalSalesBeansYr6+$CentralincrementalSalesMaizeYr6;
            
        ?>
        <?php

            foreach ($dashindicatorIncreamentalSalesMaize_E as $row) {

                $EastincrementalSalesMaizeYr1 = $exFactorYr1*(($row->incrementalSalesMaizeYr1)/usd);
                $EastincrementalSalesMaizeYr2 = $exFactorYr2*(($row->incrementalSalesMaizeYr2)/usd);
                $EastincrementalSalesMaizeYr3 = $exFactorYr3*(($row->incrementalSalesMaizeYr3)/usd);
                $EastincrementalSalesMaizeYr4 = $exFactorYr4*(($row->incrementalSalesMaizeYr4)/usd);
                $EastincrementalSalesMaizeYr5 = $exFactorYr5*(($row->incrementalSalesMaizeYr5)/usd);
                $EastincrementalSalesMaizeYr6 = $exFactorYr6*(($row->incrementalSalesMaizeYr6)/usd);
                
            }

            foreach ($dashindicatorIncreamentalSalesBeans_E as $row) {

                $EastincrementalSalesBeansYr1 = $exFactorYr1*(($row->incrementalSalesBeansYr1)/usd);
                $EastincrementalSalesBeansYr2 = $exFactorYr2*(($row->incrementalSalesBeansYr2)/usd);
                $EastincrementalSalesBeansYr3 = $exFactorYr3*(($row->incrementalSalesBeansYr3)/usd);
                $EastincrementalSalesBeansYr4 = $exFactorYr4*(($row->incrementalSalesBeansYr4)/usd);
                $EastincrementalSalesBeansYr5 = $exFactorYr5*(($row->incrementalSalesBeansYr5)/usd);
                $EastincrementalSalesBeansYr6 = $exFactorYr6*(($row->incrementalSalesBeansYr6)/usd);
                
            }
            foreach ($dashindicatorIncreamentalSalesCoffee_E as $row) {

                $EastincrementalSalesCoffeeYr1 = $exFactorYr1*(($row->incrementalSalesCoffeeYr1)/usd);
                $EastincrementalSalesCoffeeYr2 = $exFactorYr2*(($row->incrementalSalesCoffeeYr2)/usd);
                $EastincrementalSalesCoffeeYr3 = $exFactorYr3*(($row->incrementalSalesCoffeeYr3)/usd);
                $EastincrementalSalesCoffeeYr4 = $exFactorYr4*(($row->incrementalSalesCoffeeYr4)/usd);
                $EastincrementalSalesCoffeeYr5 = $exFactorYr5*(($row->incrementalSalesCoffeeYr5)/usd);
                $EastincrementalSalesCoffeeYr6 = $exFactorYr6*(($row->incrementalSalesCoffeeYr6)/usd);
                
            }

            $eastYr1 = $EastincrementalSalesCoffeeYr1+$EastincrementalSalesBeansYr1+$EastincrementalSalesMaizeYr1;
            $eastYr2 = $EastincrementalSalesCoffeeYr2+$EastincrementalSalesBeansYr2+$EastincrementalSalesMaizeYr2;
            $eastYr3 = $EastincrementalSalesCoffeeYr3+$EastincrementalSalesBeansYr3+$EastincrementalSalesMaizeYr3;
            $eastYr4 = $EastincrementalSalesCoffeeYr4+$EastincrementalSalesBeansYr4+$EastincrementalSalesMaizeYr4;
            $eastYr5 = $EastincrementalSalesCoffeeYr5+$EastincrementalSalesBeansYr5+$EastincrementalSalesMaizeYr5;
            $eastYr6 = $EastincrementalSalesCoffeeYr6+$EastincrementalSalesBeansYr6+$EastincrementalSalesMaizeYr6;
        ?>
        <?php
            foreach ($dashindicatorIncreamentalSalesMaize_W as $row) {

                $WestincrementalSalesMaizeYr1 = $exFactorYr1*(($row->incrementalSalesMaizeYr1)/usd);
                $WestincrementalSalesMaizeYr2 = $exFactorYr2*(($row->incrementalSalesMaizeYr2)/usd);
                $WestincrementalSalesMaizeYr3 = $exFactorYr3*(($row->incrementalSalesMaizeYr3)/usd);
                $WestincrementalSalesMaizeYr4 = $exFactorYr4*(($row->incrementalSalesMaizeYr4)/usd);
                $WestincrementalSalesMaizeYr5 = $exFactorYr5*(($row->incrementalSalesMaizeYr5)/usd);
                $WestincrementalSalesMaizeYr6 = $exFactorYr6*(($row->incrementalSalesMaizeYr6)/usd);
                
            }

            foreach ($dashindicatorIncreamentalSalesBeans_W as $row) {

                $WestincrementalSalesBeansYr1 = $exFactorYr1*(($row->incrementalSalesBeansYr1)/usd);
                $WestincrementalSalesBeansYr2 = $exFactorYr2*(($row->incrementalSalesBeansYr2)/usd);
                $WestincrementalSalesBeansYr3 = $exFactorYr3*(($row->incrementalSalesBeansYr3)/usd);
                $WestincrementalSalesBeansYr4 = $exFactorYr4*(($row->incrementalSalesBeansYr4)/usd);
                $WestincrementalSalesBeansYr5 = $exFactorYr5*(($row->incrementalSalesBeansYr5)/usd);
                $WestincrementalSalesBeansYr6 = $exFactorYr6*(($row->incrementalSalesBeansYr6)/usd);
                
            }
            foreach ($dashindicatorIncreamentalSalesCoffee_W as $row) {

                $WestincrementalSalesCoffeeYr1 = $exFactorYr1*(($row->incrementalSalesCoffeeYr1)/usd);
                $WestincrementalSalesCoffeeYr2 = $exFactorYr2*(($row->incrementalSalesCoffeeYr2)/usd);
                $WestincrementalSalesCoffeeYr3 = $exFactorYr3*(($row->incrementalSalesCoffeeYr3)/usd);
                $WestincrementalSalesCoffeeYr4 = $exFactorYr4*(($row->incrementalSalesCoffeeYr4)/usd);
                $WestincrementalSalesCoffeeYr5 = $exFactorYr5*(($row->incrementalSalesCoffeeYr5)/usd);
                $WestincrementalSalesCoffeeYr6 = $exFactorYr6*(($row->incrementalSalesCoffeeYr6)/usd);
                
            }
            $westYr1 = $WestincrementalSalesCoffeeYr1+$WestincrementalSalesBeansYr1+$WestincrementalSalesMaizeYr1;
            $westYr2 = $WestincrementalSalesCoffeeYr2+$WestincrementalSalesBeansYr2+$WestincrementalSalesMaizeYr2;
            $westYr3 = $WestincrementalSalesCoffeeYr3+$WestincrementalSalesBeansYr3+$WestincrementalSalesMaizeYr3;
            $westYr4 = $WestincrementalSalesCoffeeYr4+$WestincrementalSalesBeansYr4+$WestincrementalSalesMaizeYr4;
            $westYr5 = $WestincrementalSalesCoffeeYr5+$WestincrementalSalesBeansYr5+$WestincrementalSalesMaizeYr5;
            $westYr6 = $WestincrementalSalesCoffeeYr6+$WestincrementalSalesBeansYr6+$WestincrementalSalesMaizeYr6;

        ?>
        $('#indicator_fourteen_sales_increamental').highcharts({
            title: {
                text: 'Value of Incremental Sales'
            },
            chart: {
                type: 'column',
                options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }


            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
            title: {
                text: 'Sales'
            }
            },
            legend: {
                enabled: true
            },
            plotOptions: {
                column: {
                depth: 25
            },
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'blue'
                        }

                    }
                }
            },

            labels: {
                items: [{
                    html: '',
                    style: {
                        right: '10px',
                        top: '18px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            tooltip: {
                formatter: function () {
                    var point = this.point,
                        s = Highcharts.numberFormat(this.y, 0, '.') +'<br/>';
                    if (point.drilldown) {
                        s += 'Click to view more By Value Chain';
                    }
                    return s;
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'North',
                data: [{
                    name: '2013',
                    y: <?=$numYr1; ?>,
                    color: '#9E0825',
                    drilldown: 'north-2013'
                }, {
                    name: '2014',
                    y: <?=$numYr2; ?>,
                    drilldown: 'north-2014'
                }, {
                    name: '2015',
                    y: <?=$numYr3; ?>,
                    drilldown: 'north-2015'
                }, {
                    name: '2016',
                    y: <?=$numYr4; ?>,
                    drilldown: 'north-2016'
                }, {
                    name: '2017',
                    y: <?=$numYr5; ?>,
                    drilldown: 'north-2017'
                }, {
                    name: '2018',
                    y: <?=$numYr6 ?>,
                    drilldown: 'north-2018'
                }]
            },
            {
                name: 'Central',
                data: [{
                    name: '2013',
                    y: <?=$CentYr1; ?>,
                    color: '#9E0825',
                    drilldown: 'central-2013'
                }, {
                    name: '2014',
                    y: <?=$CentYr2; ?>,
                    drilldown: 'central-2014'
                }, {
                    name: '2015',
                    y: <?=$CentYr3; ?>,
                    drilldown: 'central-2015'
                }, {
                    name: '2016',
                    y: <?=$CentYr4; ?>,
                    drilldown: 'central-2016'
                }, {
                    name: '2017',
                    y: <?=$CentYr5; ?>,
                    drilldown: 'central-2017'
                }, {
                    name: '2018',
                    y: <?=$CentYr6; ?>,
                    drilldown: 'central-2018'
                }]
            },{
                name: 'East',
                data: [{
                    name: '2013',
                    y: <?=$eastYr1; ?>,
                    color: '#9E0825',
                    drilldown: 'east-2013'
                }, {
                    name: '2014',
                    y: <?=$eastYr2; ?>,
                    drilldown: 'east-2014'
                }, {
                    name: '2015',
                    y: <?=$eastYr3; ?>,
                    drilldown: 'east-2015'
                }, {
                    name: '2016',
                    y: <?=$eastYr4; ?>,
                    drilldown: 'east-2016'
                }, {
                    name: '2017',
                    y: <?=$eastYr5; ?>,
                    drilldown: 'east-2017'
                }, {
                    name: '2018',
                    y: <?=$eastYr6; ?>,
                    drilldown: 'east-2018'
                }]
            },{
                name: 'West',
                data: [{
                    name: '2013',
                    y: <?=$westYr1; ?>,
                    color: '#9E0825',
                    drilldown: 'west-2013'
                }, {
                    name: '2014',
                    y: <?=$westYr2; ?>,
                    drilldown: 'west-2014'
                }, {
                    name: '2015',
                    y: <?=$westYr3; ?>,
                    drilldown: 'west-2015'
                }, {
                    name: '2016',
                    y: <?=$westYr4; ?>,
                    drilldown: 'west-2016'
                }, {
                    name: '2017',
                    y: <?=$westYr5; ?>,
                    drilldown: 'west-2017'
                }, {
                    name: '2018',
                    y: <?=$westYr6; ?>,
                    drilldown: 'west-2018'
                }]
            }],
            drilldown: {
                _animation: {
                    duration: 2000
                },

                //Start of drill down
                series: [
                {
                    id: 'north-2013',
                    name: '2013',
                    data: [
                        ['Maize', <?=$NorthincrementalSalesMaizeYr1;?>],
                        ['Beans', <?=$NorthincrementalSalesBeansYr1;?>],
                        ['Coffee', <?=$NorthincrementalSalesCoffeeYr1;?>]
                    ]
                }, {
                    id: 'west-2013',
                    name: '2013',
                    data: [
                        ['Maize', <?=$WestincrementalSalesMaizeYr1;?>],
                        ['Beans', <?=$WestincrementalSalesBeansYr1;?>],
                        ['Coffee', <?=$WestincrementalSalesCoffeeYr1;?>]
                    ]
                }, {
                    id: 'east-2013',
                    name: '2013',
                    data: [
                        ['Maize', <?=$EastincrementalSalesMaizeYr1;?>],
                        ['Beans', <?=$EastincrementalSalesBeansYr1;?>],
                        ['Coffee', <?=$EastincrementalSalesCoffeeYr1;?>]
                    ]
                }, {
                    id: 'central-2013',
                    name: '2013',
                    data: [
                        ['Maize', <?=$CentralincrementalSalesMaizeYr1;?>],
                        ['Beans', <?=$CentralincrementalSalesBeansYr1;?>],
                        ['Coffee', <?=$CentralincrementalSalesCoffeeYr1;?>]
                    ]
                }, {
                    id: 'north-2014',
                    name: '2014',
                    data: [
                        ['Maize', <?=$NorthincrementalSalesMaizeYr2;?>],
                        ['Beans', <?=$NorthincrementalSalesBeansYr2;?>],
                        ['Coffee', <?=$NorthincrementalSalesCoffeeYr2;?>]
                    ]
                }, {
                    id: 'west-2014',
                    name: '2014',
                    data: [
                        ['Maize', <?=$WestincrementalSalesMaizeYr2;?>],
                        ['Beans', <?=$WestincrementalSalesBeansYr2;?>],
                        ['Coffee', <?=$WestincrementalSalesCoffeeYr2;?>]
                    ]
                }, {
                    id: 'east-2014',
                    name: '2014',
                    data: [
                        ['Maize', <?=$EastincrementalSalesMaizeYr2;?>],
                        ['Beans', <?=$EastincrementalSalesBeansYr2;?>],
                        ['Coffee', <?=$EastincrementalSalesCoffeeYr2;?>]
                    ]
                }, {
                    id: 'central-2014',
                    name: '2014',
                    data: [
                        ['Maize', <?=$CentralincrementalSalesMaizeYr2;?>],
                        ['Beans', <?=$CentralincrementalSalesBeansYr2;?>],
                        ['Coffee', <?=$CentralincrementalSalesCoffeeYr2;?>]
                    ]
                },{
                        id: 'north-2015',
                        name: '2015',
                        data: [
                            ['Maize', <?=$NorthincrementalSalesMaizeYr3;?>],
                            ['Beans', <?=$NorthincrementalSalesBeansYr3;?>],
                            ['Coffee', <?=$NorthincrementalSalesCoffeeYr3;?>]
                        ]
                    }, {
                        id: 'west-2015',
                        name: '2015',
                        data: [
                            ['Maize', <?=$WestincrementalSalesMaizeYr3;?>],
                            ['Beans', <?=$WestincrementalSalesBeansYr3;?>],
                            ['Coffee', <?=$WestincrementalSalesCoffeeYr3;?>]
                        ]
                    }, {
                        id: 'east-2015',
                        name: '2015',
                        data: [
                            ['Maize', <?=$EastincrementalSalesMaizeYr3;?>],
                            ['Beans', <?=$EastincrementalSalesBeansYr3;?>],
                            ['Coffee', <?=$EastincrementalSalesCoffeeYr3;?>]
                        ]
                    }, {
                        id: 'central-2015',
                        name: '2015',
                        data: [
                            ['Maize', <?=$CentralincrementalSalesMaizeYr3;?>],
                            ['Beans', <?=$CentralincrementalSalesBeansYr3;?>],
                            ['Coffee', <?=$CentralincrementalSalesCoffeeYr3;?>]
                        ]
                    },


                    {
                        id: 'north-2016',
                        name: '2016',
                        data: [
                            ['Maize', <?=$NorthincrementalSalesMaizeYr4;?>],
                            ['Beans', <?=$NorthincrementalSalesBeansYr4;?>],
                            ['Coffee', <?=$NorthincrementalSalesCoffeeYr4;?>]
                        ]
                    }, {
                        id: 'west-2016',
                        name: '2016',
                        data: [
                            ['Maize', <?=$WestincrementalSalesMaizeYr4;?>],
                            ['Beans', <?=$WestincrementalSalesBeansYr4;?>],
                            ['Coffee', <?=$WestincrementalSalesCoffeeYr4;?>]
                        ]
                    }, {
                        id: 'east-2016',
                        name: '2016',
                        data: [
                            ['Maize', <?=$EastincrementalSalesMaizeYr4;?>],
                            ['Beans', <?=$EastincrementalSalesBeansYr4;?>],
                            ['Coffee', <?=$EastincrementalSalesCoffeeYr4;?>]
                        ]
                    }, {
                        id: 'central-2016',
                        name: '2016',
                        data: [
                            ['Maize', <?=$CentralincrementalSalesMaizeYr4;?>],
                            ['Beans', <?=$CentralincrementalSalesBeansYr4;?>],
                            ['Coffee', <?=$CentralincrementalSalesCoffeeYr4;?>]
                        ]
                    },


                    {
                        id: 'north-2017',
                        name: '2017',
                        data: [
                            ['Maize', <?=$NorthincrementalSalesMaizeYr5;?>],
                            ['Beans', <?=$NorthincrementalSalesBeansYr5;?>],
                            ['Coffee', <?=$NorthincrementalSalesCoffeeYr5;?>]
                        ]
                    }, {
                        id: 'west-2017',
                        name: '2017',
                        data: [
                            ['Maize', <?=$WestincrementalSalesMaizeYr5;?>],
                            ['Beans', <?=$WestincrementalSalesBeansYr5;?>],
                            ['Coffee', <?=$WestincrementalSalesCoffeeYr5;?>]
                        ]
                    }, {
                        id: 'east-2017',
                        name: '2017',
                        data: [
                            ['Maize', <?=$EastincrementalSalesMaizeYr5;?>],
                            ['Beans', <?=$EastincrementalSalesBeansYr5;?>],
                            ['Coffee', <?=$EastincrementalSalesCoffeeYr5;?>]
                        ]
                    }, {
                        id: 'central-2017',
                        name: '2017',
                        data: [
                            ['Maize', <?=$CentralincrementalSalesMaizeYr5;?>],
                            ['Beans', <?=$CentralincrementalSalesBeansYr5;?>],
                            ['Coffee', <?=$CentralincrementalSalesCoffeeYr5;?>]
                        ]
                    },


                    {
                        id: 'north-2018',
                        name: '2018',
                        data: [
                            ['Maize', <?=$NorthincrementalSalesMaizeYr6;?>],
                            ['Beans', <?=$NorthincrementalSalesBeansYr6;?>],
                            ['Coffee', <?=$NorthincrementalSalesCoffeeYr6;?>]
                        ]
                    }, {
                        id: 'west-2018',
                        name: '2018',
                        data: [
                            ['Maize', <?=$WestincrementalSalesMaizeYr6;?>],
                            ['Beans', <?=$WestincrementalSalesBeansYr6;?>],
                            ['Coffee', <?=$WestincrementalSalesCoffeeYr6;?>]
                        ]
                    }, {
                        id: 'east-2018',
                        name: '2018',
                        data: [
                            ['Maize', <?=$EastincrementalSalesMaizeYr6;?>],
                            ['Beans', <?=$EastincrementalSalesBeansYr6;?>],
                            ['Coffee', <?=$EastincrementalSalesCoffeeYr6;?>]
                        ]
                    }, {
                        id: 'central-2018',
                        name: '2018',
                        data: [
                            ['Maize', <?=$CentralincrementalSalesMaizeYr6;?>],
                            ['Beans', <?=$CentralincrementalSalesBeansYr6;?>],
                            ['Coffee', <?=$CentralincrementalSalesCoffeeYr6;?>]
                        ]
                    }]
                }

        });
    });
</script>


<script type="text/javascript">

    $(function () {
        

        <?php
                
            $notrainedBeansYr1=number_format((float)$notrainedBeansYr1, 2, '.', '');

            $notrainedMaizeYr1=number_format((float)$notrainedBeansYr1, 2, '.', '');
            $notrainedCoffeeYr1 =number_format((float)$notrainedCoffeeYr1, 2, '.', '');
            $notrainedBeansYr2 =number_format((float)$notrainedBeansYr2, 2, '.', '');
            $notrainedMaizeYr2 =number_format((float)$notrainedMaizeYr2, 2, '.', '');
            $notrainedCoffeeYr2=number_format((float)$notrainedCoffeeYr2, 2, '.', '');
            $notrainedBeansYr3 =number_format((float)$notrainedBeansYr3, 2, '.', '');
            $notrainedMaizeYr3 =number_format((float)$notrainedMaizeYr3, 2, '.', '');
            $notrainedCoffeeYr3 =number_format((float)$notrainedCoffeeYr3, 2, '.', '');
            $notrainedBeansYr4 =number_format((float)$notrainedBeansYr4, 2, '.', '');
            $notrainedMaizeYr4 =number_format((float)$notrainedMaizeYr4, 2, '.', '');
            $notrainedCoffeeYr4 =number_format((float)$notrainedCoffeeYr4, 2, '.', '');
            $notrainedBeansYr5 =number_format((float)$notrainedBeansYr5, 2, '.', '');
            $notrainedMaizeYr5 =number_format((float)$notrainedMaizeYr5, 2, '.', '');
            $notrainedCoffeeYr5 =number_format((float)$notrainedCoffeeYr5, 2, '.', '');
            $notrainedBeansYr6 =number_format((float)$notrainedBeansYr6, 2, '.', '');
            $notrainedMaizeYr6 =number_format((float)$notrainedMaizeYr6, 2, '.', '');
            $notrainedCoffeeYr6 =number_format((float)$notrainedCoffeeYr6, 2, '.', '');
            
          
             //var_dump($notrainedBeansYr1);
                
            

        ?>
        

        $('#indicator_dashindicatorGrossmargin').highcharts({
            title: {
                text: 'Gross Margin'
            },
            chart: {
                type: 'column',
            },
             xAxis: {
                 type: 'category'
            },
            yAxis: {
            min:0,
            
            title: {
                text: 'Sales'
            }
            },
            legend: {
                enabled: true
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'blue'
                        }

                    }
                }
            },

            labels: {
                items: [{
                    html: '',
                    style: {
                        right: '10px',
                        top: '18px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            credits: {
                enabled: false
            },
            series: [{
                name: '2013',
               data: [
                            ['Maize', <?=$notrainedMaizeYr1;?>],
                            ['Beans', <?=$notrainedBeansYr1;?>],
                            ['Coffee', <?=$notrainedCoffeeYr1;?>]
                        ]
            },
            {
                name: '2014',
                data: [
                            ['Maize', <?=$notrainedMaizeYr2;?>],
                            ['Beans', <?=$notrainedBeansYr2;?>],
                            ['Coffee', <?=$notrainedCoffeeYr2;?>]
                        ]
            },
            {
                name: '2015',
                data: [
                            ['Maize', <?=$notrainedMaizeYr3;?>],
                            ['Beans', <?=$notrainedBeansYr3;?>],
                            ['Coffee', <?=$notrainedCoffeeYr3;?>]
                        ]
            },
            {
                name: '2016',
                data: [
                            ['Maize', <?=$notrainedMaizeYr4;?>],
                            ['Beans', <?=$notrainedBeansYr4;?>],
                            ['Coffee', <?=$notrainedCoffeeYr4;?>]
                        ]
            },
            {
                name: '2017',
                data: [
                            ['Maize', <?=$notrainedMaizeYr5;?>],
                            ['Beans', <?=$notrainedBeansYr5;?>],
                            ['Coffee', <?=$notrainedCoffeeYr5;?>]
                        ]
            },{
                name: '2018',
                data: [
                            ['Maize', <?=$notrainedMaizeYr6;?>],
                            ['Beans', <?=$notrainedBeansYr6;?>],
                            ['Coffee', <?=$notrainedCoffeeYr6;?>]
                        ]
            }


            ]
            
        

        });
    });
</script>


<script type="text/javascript">

    $(function () {
        

        <?php
                
            
                
            

        ?>
        

        $('#indicator_risk_management').highcharts({
            title: {
                text: 'Number of farmers implementing risk-reducing practices/actions'
            },
            chart: {
                type: 'column',
            },
             xAxis: {
                 type: 'category'
            },
            yAxis: {
            min:0,
            
            title: {
                text: 'Number of stakeholders'
            }
            },
            legend: {
                enabled: true
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'blue'
                        }

                    }
                }
            },

            labels: {
                items: [{
                    html: '',
                    style: {
                        right: '10px',
                        top: '18px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            tooltip: {
                formatter: function () {
                    var point = this.point,
                        s = Highcharts.numberFormat(this.y, 0, '.') +'<br/>';
                    if (point.drilldown) {
                        s += 'Click to view more By Value Chain';
                    }
                    return s;
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'North',
               data: [
                            {name:'2013', y:<?=$riskReducingPracticeN['notrainedYr1'];?>,drilldown: 'north-2013'},
                            {name:'2014', y:<?=$riskReducingPracticeN['notrainedYr2'];?>,drilldown: 'north-2014'},
                            {name:'2015', y:<?=$riskReducingPracticeN['notrainedYr3'];?>,drilldown: 'north-2015'},
                            {name:'2016', y:<?=$riskReducingPracticeN['notrainedYr4'];?>,drilldown: 'north-2016'},
                            {name:'2017', y:<?=$riskReducingPracticeN['notrainedYr5'];?>,drilldown: 'north-2017'},
                            {name:'2018', y:<?=$riskReducingPracticeN['notrainedYr6'];?>,drilldown: 'north-2018'}
                        ]
                
            },
            {
                name: 'Central',
                data: [
                           {name:'2013', y:<?=$riskReducingPracticeC['notrainedYr1'];?>,drilldown: 'central-2013'},
                            {name:'2014', y:<?=$riskReducingPracticeC['notrainedYr2'];?>,drilldown: 'central-2014'},
                            {name:'2015', y:<?=$riskReducingPracticeC['notrainedYr3'];?>,drilldown: 'central-2015'},
                           {name:'2016', y:<?=$riskReducingPracticeC['notrainedYr4'];?>,drilldown: 'central-2016'},
                           {name:'2017', y:<?=$riskReducingPracticeC['notrainedYr5'];?>,drilldown: 'central-2017'},
                           {name:'2018', y: <?=$riskReducingPracticeC['notrainedYr6'];?>,drilldown: 'central-2018'}
                        ]
            },
            {
                name: 'East',
                data: [
                            {name:'2013', y:<?=$riskReducingPracticeE['notrainedYr1'];?>,drilldown: 'east-2013'},
                            {name:'2014', y:<?=$riskReducingPracticeE['notrainedYr2'];?>,drilldown: 'east-2014'},
                            {name:'2015', y:<?=$riskReducingPracticeE['notrainedYr3'];?>,drilldown: 'east-2015'},
                            {name:'2016', y:<?=$riskReducingPracticeE['notrainedYr4'];?>,drilldown: 'east-2016'},
                            {name:'2017', y:<?=$riskReducingPracticeE['notrainedYr5'];?>,drilldown: 'east-2017'},
                            {name:'2018', y:<?=$riskReducingPracticeE['notrainedYr6'];?>,drilldown: 'east-2018'}
                        ]
            },
            {
                name: 'West',
                data: [
                            {name:'2013', y:<?=$riskReducingPracticeW['notrainedYr1'];?>,drilldown: 'west-2013'},
                            {name:'2014', y:<?=$riskReducingPracticeW['notrainedYr2'];?>,drilldown: 'west-2014'},
                            {name:'2015', y:<?=$riskReducingPracticeW['notrainedYr3'];?>,drilldown: 'west-2015'},
                            {name:'2016', y:<?=$riskReducingPracticeW['notrainedYr4'];?>,drilldown: 'west-2016'},
                            {name:'2017', y:<?=$riskReducingPracticeW['notrainedYr5'];?>,drilldown: 'west-2017'},
                            {name:'2018', y:<?=$riskReducingPracticeW['notrainedYr6'];?>,drilldown: 'west-2018'}
                        ]
            }
            


            ],
            drilldown: {
                _animation: {
                    duration: 2000
                },

                //Start of drill down
                series: [
                {
                    id: 'north-2013',
                    name: '2013',
                    data: [
                        ['Maize', <?=$riskReducingPracticeMaizeN['notrainedYr1'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansN['notrainedYr1'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeN['notrainedYr1'];?>]
                    ]
                }, {
                    id: 'west-2013',
                    name: '2013',
                   data: [
                        ['Maize', <?=$riskReducingPracticeMaizeW['notrainedYr1'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansW['notrainedYr1'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeW['notrainedYr1'];?>]
                    ]
                }, {
                    id: 'east-2013',
                    name: '2013',
                    data: [
                        ['Maize', <?=$riskReducingPracticeMaizeE['notrainedYr1'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansE['notrainedYr1'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeE['notrainedYr1'];?>]
                    ]
                }, {
                    id: 'central-2013',
                    name: '2013',
                    data: [
                        ['Maize', <?=$riskReducingPracticeMaizeC['notrainedYr1'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansC['notrainedYr1'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeC['notrainedYr1'];?>]
                    ]
                }, {
                    id: 'north-2014',
                    name: '2014',
                    data: [
                        ['Maize', <?=$riskReducingPracticeMaizeN['notrainedYr2'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansN['notrainedYr2'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeN['notrainedYr2'];?>]
                    ]
                }, {
                    id: 'west-2014',
                    name: '2014',
                    data: [
                        ['Maize', <?=$riskReducingPracticeMaizeW['notrainedYr2'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansW['notrainedYr2'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeW['notrainedYr2'];?>]
                    ]
                }, {
                    id: 'east-2014',
                    name: '2014',
                    data: [
                        ['Maize', <?=$riskReducingPracticeMaizeE['notrainedYr2'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansE['notrainedYr2'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeE['notrainedYr2'];?>]
                    ]
                }, {
                    id: 'central-2014',
                    name: '2014',
                    data: [
                        ['Maize', <?=$riskReducingPracticeMaizeC['notrainedYr2'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansC['notrainedYr2'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeC['notrainedYr2'];?>]
                    ]
                },{
                        id: 'north-2015',
                        name: '2015',
                   data: [
                        ['Maize', <?=$riskReducingPracticeMaizeN['notrainedYr3'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansN['notrainedYr3'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeN['notrainedYr3'];?>]
                    ]
                    }, {
                        id: 'west-2015',
                        name: '2015',
                        data: [
                        ['Maize', <?=$riskReducingPracticeMaizeW['notrainedYr3'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansW['notrainedYr3'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeW['notrainedYr3'];?>]
                    ]
                    }, {
                        id: 'east-2015',
                        name: '2015',
                        data: [
                        ['Maize', <?=$riskReducingPracticeMaizeE['notrainedYr3'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansE['notrainedYr3'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeE['notrainedYr3'];?>]
                    ]
                    }, {
                        id: 'central-2015',
                        name: '2015',
                        data: [
                        ['Maize', <?=$riskReducingPracticeMaizeC['notrainedYr3'];?>],
                        ['Beans', <?=$riskReducingPracticeBeansC['notrainedYr3'];?>],
                        ['Coffee', <?=$riskReducingPracticeCoffeeC['notrainedYr3'];?>]
                    ]
                    },


                    {
                        id: 'north-2016',
                        name: '2016',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeN['notrainedYr4'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansN['notrainedYr4'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeN['notrainedYr4'];?>]
                        ]
                    }, {
                        id: 'west-2016',
                        name: '2016',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeW['notrainedYr4'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansW['notrainedYr4'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeW['notrainedYr4'];?>]
                        ]
                    }, {
                        id: 'east-2016',
                        name: '2016',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeE['notrainedYr4'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansE['notrainedYr4'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeE['notrainedYr4'];?>]
                        ]
                    }, {
                        id: 'central-2016',
                        name: '2016',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeC['notrainedYr4'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansC['notrainedYr4'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeC['notrainedYr4'];?>]
                        ]
                    },


                    {
                        id: 'north-2017',
                        name: '2017',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeN['notrainedYr5'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansN['notrainedYr5'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeN['notrainedYr5'];?>]
                        ]
                    }, {
                        id: 'west-2017',
                        name: '2017',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeW['notrainedYr5'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansW['notrainedYr5'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeW['notrainedYr5'];?>]
                        ]
                    }, {
                        id: 'east-2017',
                        name: '2017',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeE['notrainedYr5'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansE['notrainedYr5'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeE['notrainedYr5'];?>]
                        ]
                    }, {
                        id: 'central-2017',
                        name: '2017',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeC['notrainedYr5'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansC['notrainedYr5'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeC['notrainedYr5'];?>]
                        ]
                    },


                    {
                        id: 'north-2018',
                        name: '2018',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeN['notrainedYr6'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansN['notrainedYr6'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeN['notrainedYr6'];?>]
                        ]
                    }, {
                        id: 'west-2018',
                        name: '2018',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeW['notrainedYr6'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansW['notrainedYr6'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeW['notrainedYr6'];?>]
                        ]
                    }, {
                        id: 'east-2018',
                        name: '2018',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeE['notrainedYr6'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansE['notrainedYr6'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeE['notrainedYr6'];?>]
                        ]
                    }, {
                        id: 'central-2018',
                        name: '2018',
                        data: [
                            ['Maize', <?=$riskReducingPracticeMaizeC['notrainedYr6'];?>],
                            ['Beans', <?=$riskReducingPracticeBeansC['notrainedYr6'];?>],
                            ['Coffee', <?=$riskReducingPracticeCoffeeC['notrainedYr6'];?>]
                        ]
                    }]
                }
            
        

        });
    });
</script>




</body>

</html>