<?php
$title=$_GET['title'];
$categories=$_GET['categories'];
$agegrparray=$_GET['arr'];
$agegrp1=$_GET['agegrp1'];
$agegrp2=$_GET['agegrp2'];
$agegrp3=$_GET['agegrp3'];
$agegrp4=$_GET['agegrp4'];
$agegrp5=$_GET['agegrp5'];

 ?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
            },
            title: {
                text: '<?php echo $title; ?>'
            },
            xAxis: {
                categories: <?php echo $categories; ?>
            },
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = ''+
                            this.point.name +': '+ this.y +' Parishoner(s)';
                    } else {
                        s = ''+
                            this.x  +': '+ this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                    html: '',
                    style: {
                        left: '40px',
                        top: '8px',
                        color: 'black'
                    }
                }]
            },
            /*series: [{
                type: 'column',
                name: 'Age Group',
                data: [2, 3, 5, 7, 6]
				$_GET['agegrp2'], $_GET['agegrp3'], $_GET['agegrp4'], $_GET['agegrp5']?>'
            }*/
			 series: [{
                type: 'column',
                name: 'Age Group',
				 data: <?php echo $agegrparray;?>
               ,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 3px black'
                    }
                }
            }
			
			
			
			
			
			, {
                type: 'spline',
                name: 'Average',
                data: <?php echo $agegrparray;?>,
                marker: {
                	lineWidth: 2,
                	lineColor: Highcharts.getOptions().colors[3],
                	fillColor: 'white'
                }
            }, {
                type: 'pie',
                name: 'Number',
                  data: [{
                    name: '00 - 14',
                    y:  <?php echo $agegrp1;?>,
                    color: Highcharts.getOptions().colors[0] // Jane's color
                }, {
                    name: '15 - 25',
                    y:  <?php echo $agegrp2;?>,
                    color: Highcharts.getOptions().colors[1] // John's color
                }, {
                    name: '26 - 35',
                    y:  <?php echo $agegrp3;?> ,
                    color: Highcharts.getOptions().colors[2] // Joe's color
                }, {
                    name: '36 - 45',
                    y:  <?php echo $agegrp4;?>,
                    color: Highcharts.getOptions().colors[3] // Joe's color
                }, {
                    name: '46 and above',
                    y:  <?php echo $agegrp5;?>,
                    color: Highcharts.getOptions().colors[4] // Joe's color
                }],
                center: [100, 80],
                size: 100,
                showInLegend: true,
                dataLabels: {
                    enabled: false
                }
            }]
        });
    });
    

		</script>
	</head>
	<body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
