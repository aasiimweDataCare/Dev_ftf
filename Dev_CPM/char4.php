<?php
require_once('connections/lib_connect.php');
$indcator=$_SESSION['title1'];

#require_once('chart.php');
 #$indicator_id1=$_GET['indicator_id'];
 #$id1=$_SESSION['id'];
 #$_SESSION['indicator_id']='56940';
// NOTE: how we are filling 3 arrays full of data,
//       one for each line on the graph
//

/* if( isset( $_GET['indicator_id'] ) )

{
  $indicator_id = intval( $_GET['indicator_id'] ); */
#indicator_name,year,target,actual,percentageAchieved
  
#}
$data_1 = array();
$data_2 = array();
$data_3 = array();
$data_4 = array();
$sql="select indicator_id,indicator_name,year,target,actual,percentageAchieved from view_dashboard where indicator_id='".$_GET['indicator_id']."' order by year asc";
//echo $sql="select indicator_id,indicator_name,year,target,actual,percentageAchieved from view_dashboard where indicator_id='56940' order by year asc";
$sqlQRY = mysql_query($sql)or die(http(0098));
			while($row = mysql_fetch_array($sqlQRY)){
			
			$data_1[] = $row['target'];
			$data_2[] = $row['actual'];
			$data_3[] = $row['percentageAchieved'];
			$data_4[] = $row['year'];
			#$data_5[] = $row['indicator_name'];	
			
			#$yMax = max( array( max( $data_1 ), max( $data_2 ), max( $data_3 ) )); 
				$cTr++;
			}

 
 $yMax = max( array( max( $data_1 ), max( $data_2 ), max( $data_3 ) )); 
//create the chart:


include_once( 'connections/open-flash-chart.php' );
$g = new graph();
$g->title( $_SESSION['title1'] ,'{font-size: 15px; color: #800000}');
#$g->title( 'Annual Performance:".$indicator."', '{font-size: 15px; color: #800000}' );

$g->set_data( $data_1 );
$g->bar( 50, '#9933CC', 'Targets', 10 );

$g->set_data( $data_2 );
$g->bar( 50, '#339966', 'Actuals', 10 );
 
$g->set_data( $data_3 );
$g->line_dot( 3, 5, '#000000', ' Percentage Achieved', 10 );    // <-- 3px thick + dots

$g->set_x_labels($data_4);
$g->set_x_legend( 'Annual Perfomance', 10, '#736AFF' );
#$g->set_x_label_style( $data_4, '#9933CC',2 );
$g->set_y_max( $yMax );
$g->y_label_steps( 5 );
$g->set_y_legend( 'Number', 12, '#736AFF' );
echo $g->render();
?>

